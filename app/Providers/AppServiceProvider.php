<?php

namespace App\Providers;

use App\Interfaces\AuthServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServiceInterface;
use App\Interfaces\StoreRepositoryInterface;
use App\Interfaces\StoreServiceInterface;
use App\Interfaces\TypeUsersRepositoryInterface;
use App\Interfaces\TypeUsersServiceInterface;
use App\Interfaces\MenusServiceInterface;

use App\Repositories\UserRepository;
use App\Repositories\StoreRepository;
use App\Repositories\TypeUsersRepository;
use App\Services\AuthJWTSevice;
use App\Services\UserService;
use App\Services\StoreService;
use App\Services\TypeUsersService;
use App\Services\MenusService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(AuthServiceInterface::class, AuthJWTSevice::class);
        $this->app->bind(StoreRepositoryInterface::class, StoreRepository::class);
        $this->app->bind(StoreServiceInterface::class, StoreService::class);
        $this->app->bind(TypeUsersRepositoryInterface::class, TypeUsersRepository::class);
        $this->app->bind(TypeUsersServiceInterface::class, TypeUsersService::class);
        $this->app->bind(MenusServiceInterface::class, MenusService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data = null, $message = 'Operação realizada com sucesso', $status = 200) {
            return Response::json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ], $status);
        });

        Response::macro('error', function ($message = 'Ocorreu um erro', $status = 400, $errors = null) {
            return Response::json([
                'success' => false,
                'message' => $message,
                'errors' => $errors
            ], $status);
        });
    }
}
