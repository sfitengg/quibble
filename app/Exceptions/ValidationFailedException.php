<?php

namespace App\Exceptions;

use Exception;

class ValidationFailedException extends Exception
{
    protected $message = 'Validation failed exception';
    public function __construct($errors)
    {
        $this->message = ['validationErrors'=>$errors];
    }
}