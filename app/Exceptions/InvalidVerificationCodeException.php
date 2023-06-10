<?php

namespace App\Exceptions;

use Exception;

class InvalidVerificationCodeException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('validation.exists', ['attribute' => 'verification_code']), 422, null);

    }
}
