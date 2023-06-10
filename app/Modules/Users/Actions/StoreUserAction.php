<?php

namespace App\Modules\Users\Actions;

use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\Model\User;

class StoreUserAction
{
    public static function execute(UserDTO $userDTO)
    {
        return User::create($userDTO->toArrayWithoutNulls());
    }
}
