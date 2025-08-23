<?php

namespace App\Services;

use App\Interfaces\AuthServiceInterface;

class AuthJWTSevice implements AuthServiceInterface
{

    protected $auth;

    public function __construct()
    {
         /** @var \Tymon\JWTAuth\JWTGuard $auth */
         $this->auth = auth('api');
    }

    public function login($credentials)
    {
        if (!$token = $this->auth->attempt($credentials)) {
            return false;
        }
        
       ;
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->auth->factory()->getTTL() * 1440,
            'refresh_token' => $this->refresh(),
        ];
    }

    public function logout()
    {
        $this->auth->logout();

        return  true;
    }

    public function refresh()
    {
        $newToken = $this->auth->refresh();

        return [
            'access_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => $this->auth->factory()->getTTL() * 1440
        ];
    }

    public function me()
    {
        return $this->auth->user();
    }

    public function register(array $data) {}
}
