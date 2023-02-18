<?php

namespace App\Modules\Users\Actions;

use App\Modules\Users\Model\User;
use App\Modules\Users\DTO\UserDTO;

class StoreUserAction
{
    public static function execute(
    UserDTO $userDTO
    ){

        return User::create(array_null_filter($userDTO->toArray()));
    }
}
