<?php

namespace App\Modules\Users\DTO;

use App\Classes\OptimizedDataTransferObject;

class UserLoginDTO extends OptimizedDataTransferObject
{
    /* @var string|null */
    public $email;

    /* @var string|null */
    public $password;

    public static function fromRequest($request)
    {
        return new self([
            'email' => $request['email'] ?? null,
            'password' => $request['password'] ?? null,
        ]);
    }
}
