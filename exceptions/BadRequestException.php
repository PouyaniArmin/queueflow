<?php
namespace Exceptions;

use Exception;
use Throwable;

class BadRequestException extends Exception{

    public function __construct(string $message = "Bad Request", int $code = 400)
    {
        return parent::__construct($message, $code);
    }
}