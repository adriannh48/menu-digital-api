<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Custom\UnauthorizedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\Interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
{
    try {
        $data = $request->validated();                // use os dados validados
        $user = $this->authService->register($data);  // não use all()

        return response()->json([
            'message' => 'Usuário cadastrado com sucesso',
            'data'    => $user,
        ], 201);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['errors' => $e->errors()], 422);

    } catch (\Throwable $e) {
        Log::error('Register error', ['e' => $e]);
        return response()->json(['message' => $e], 500);
    }
}


    public function login(LoginRequest $request)
    {
        $request->validated();

        $token = $this->authService->login($request->only('email', 'password'));

        if (!$token) {
            throw new UnauthorizedException('Credenciais inválidas');
        }

        return response()->json($token);
    }

    public function logout()
    {
        $this->authService->logout();

        return response()->suscess([], 'Logout realizado com sucesso', 200);
    }
}
