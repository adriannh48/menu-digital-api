<?php

namespace App\Exceptions\Custom;

use Exception;

class ValidationException extends Exception
{
    protected $errors;

    public function __construct($errors = [], $message = "Erro de validação")
    {
        parent::__construct($message, 422);
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
