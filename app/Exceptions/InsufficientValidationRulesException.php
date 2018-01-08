<?php

namespace App\Exceptions;

use Exception;

class InsufficientValidationRulesException extends Exception
{
    protected $fields = [];
    protected $message = 'Insufficent validation rules exception';
    public function __construct($fields)
    {
        $this->fields = $fields;
        $this->message = "The field(s) [".implode(',',$fields)."] have no rules..";
    }
}