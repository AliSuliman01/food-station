<?php

namespace App\Modules\Users\DTO;

use App\Classes\OptimizedDataTransferObject;

class UserRegisterDTO extends OptimizedDataTransferObject
{
    /* @var string|null */
    public $name;

    /* @var string|null */
    public $email;

    /* @var string|null */
    public $photo_path;

    /* @var string|null */
    public $password;

    public static function fromRequest($request)
    {
        return new self([
            'name' => $request['name'] ?? null,
            'email' => $request['email'] ?? null,
            'photo_path' => $request['photo_path'] ?? null,
            'password' => $request['password'] ?? null,
        ]);
    }
}
