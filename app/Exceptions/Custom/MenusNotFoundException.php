<?php

namespace App\Exceptions\Custom;

use Exception;

class MenusNotFoundException extends Exception
{
    protected $message = 'Menu não encontrado';
    protected $code = 404;
} 