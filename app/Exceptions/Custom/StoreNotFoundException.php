<?php

namespace App\Exceptions\Custom;

use Exception;

class StoreNotFoundException extends Exception
{
    protected $message = 'Loja não encontrada';
    protected $code = 404;
} 