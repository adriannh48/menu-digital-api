<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Exceptions\Custom\UserNotFoundException;
use App\Exceptions\Custom\UnauthorizedException;
use App\Exceptions\Custom\ValidationException as CustomValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function render($request, Throwable $exception)
    {
        
        if ($exception instanceof UserNotFoundException) {
            return response()->error($exception->getMessage(), 404);
        }

        if ($exception instanceof UnauthorizedException) {
            return response()->error($exception->getMessage(), 401);
        }

        if ($exception instanceof CustomValidationException) {
            return response()->error($exception->getMessage(), 422, $exception->getErrors());
        }

        return parent::render($request, $exception);
    }
}
