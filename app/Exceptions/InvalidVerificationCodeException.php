<?php

namespace App\Exceptions;

use App\Helpers\Response;
use Illuminate\Http\Request;
use Exception;
use Throwable;

class InvalidVerificationCodeException extends Exception
{
    public function __construct()
    {
        parent::__construct(__('validation.exists', ['attribute' => 'verification_code']), 422, null);

    }
}
