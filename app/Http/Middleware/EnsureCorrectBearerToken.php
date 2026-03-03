<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class EnsureCorrectBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $header = $request->header('Authorization');

        if ($header && Str::startsWith(Str::lower($header), 'bearer ')) {
            // Se começar com 'bearer ' (minúsculo), corrige para 'Bearer '
            if (!Str::startsWith($header, 'Bearer ')) {
                $newToken = 'Bearer ' . Str::substr($header, 7);
                $request->headers->set('Authorization', $newToken);
                
                // Força o parseamento novamente se necessário pelo framework
                // mas geralmente alterar o header é suficiente para o $request->bearerToken()
                // funcionar nas chamadas subsequentes.
            }
        }

        return $next($request);
    }
}
