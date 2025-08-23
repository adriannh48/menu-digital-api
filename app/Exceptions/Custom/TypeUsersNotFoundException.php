<?php

namespace App\Exceptions\Custom;

use Exception;

class TypeUsersNotFoundException extends Exception
{
    protected $message = 'Tipo de usuário não encontrado';
    protected $code = 404;
} 