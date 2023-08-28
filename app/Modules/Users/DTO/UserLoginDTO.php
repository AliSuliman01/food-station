<?php

namespace App\Modules\Users\DTO;

use App\Classes\OptimizedDataTransferObject;

class UserLoginDTO extends OptimizedDataTransferObject
{
    /* @var string|null */
    public $username;

    /* @var string|null */
    public $password;

    public static function fromRequest($request)
    {
        return new self([
            'username' => $request['username'] ?? null,
            'password' => $request['password'] ?? null,
        ]);
    }
}
