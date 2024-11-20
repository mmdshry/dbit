<?php

namespace App\Exceptions;

use Exception;

class BadRequestException extends Exception
{
    /**
     * Construct the BadRequestException.
     *
     * @param  string  $message  Custom error message (default: 'Bad Request').
     * @param  int  $code  HTTP status code (default: 400).
     * @param  Exception|null  $previous  Previous exception for chaining (optional).
     */
    public function __construct(string $message = 'Bad Request', int $code = 400, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
