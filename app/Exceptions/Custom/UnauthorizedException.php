<?php

namespace App\Exceptions\Custom;

use Exception;

class UnauthorizedException extends Exception
{
    public function __construct($message = "Acesso não autorizado")
    {
        parent::__construct($message, 401);
    }
}
