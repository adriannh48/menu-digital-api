<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StoresController;
use App\Http\Controllers\Api\TypeUsersController;
use Tymon\JWTAuth\Facades\JWTAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', action: [AuthController::class, 'logout']);
        
        Route::get('/user', function (Request $request) {
            return response()->success($request->user());
        });

        Route::prefix('stores')->group(function () {
            Route::get('/', [StoresController::class, 'index']);        // Listar todos
            Route::get('/paginate', [StoresController::class, 'paginate']); // Listar paginado
            Route::get('/{id}', [StoresController::class, 'show']);      // Buscar 1
            Route::post('/', [StoresController::class, 'store']);        // Criar
            Route::put('/{id}', [StoresController::class, 'update']);    // Atualizar
            Route::delete('/{id}', [StoresController::class, 'destroy']); // Deletar
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);        // Listar todos
            Route::get('/{id}', [UserController::class, 'show']);      // Buscar 1
            Route::post('/', [UserController::class, 'store']);        // Criar
            Route::put('/{id}', [UserController::class, 'update']);    // Atualizar
            Route::delete('/{id}', [UserController::class, 'destroy']); // Deletar
        });
        
        Route::prefix('type-users')->group(function () {
            Route::get('/', [TypeUsersController::class, 'index']);        // Listar todos
            Route::get('/paginate', [TypeUsersController::class, 'paginate']); // Listar paginado
            Route::get('/{id}', [TypeUsersController::class, 'show']);      // Buscar 1
            Route::post('/', [TypeUsersController::class, 'store']);        // Criar
            Route::put('/{id}', [TypeUsersController::class, 'update']);    // Atualizar
            Route::delete('/{id}', [TypeUsersController::class, 'destroy']); // Deletar
        });

        Route::prefix('menus')->group(function () {
            Route::get('/', [\App\Http\Controllers\Api\MenusController::class, 'index']);        // Listar todos
            Route::get('/paginate', [\App\Http\Controllers\Api\MenusController::class, 'paginate']); // Listar paginado
            Route::get('/{id}', [\App\Http\Controllers\Api\MenusController::class, 'show']);      // Buscar 1
            Route::post('/', [\App\Http\Controllers\Api\MenusController::class, 'store']);        // Criar
            Route::put('/{id}', [\App\Http\Controllers\Api\MenusController::class, 'update']);    // Atualizar
            Route::delete('/{id}', [\App\Http\Controllers\Api\MenusController::class, 'destroy']); // Deletar
        });
    });
});
