<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Interfaces\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthService implements AuthServiceInterface
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
    public function register(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name'         => $data['name'],
                'email'        => $data['email'],
                'password'     => Hash::make($data['password']),
                'type_user' => $data['type_user'] ?? 1,
            ]);

            // evita retornar password/atributos sujos
            return true;
        });
        return $user;
    }

     public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return false;
        }

        /** @var \App\Models\User $user */
        $user  = Auth::user(); // pega na hora, não no __construct
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user'         => ['id'=>$user->id,'name'=>$user->name,'email'=>$user->email],
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ];
    }

    public function logout(): void
    {
        if ($user = Auth::user()) {
            // apaga só o token atual (Sanctum)
            /** @var \App\Models\User $user */
            $token = $user->currentAccessToken();
            if ($token) {
                $token->delete();
            }
            // ou todos: $user->tokens()->delete();
        }
    }

    public function refresh() {}
}
