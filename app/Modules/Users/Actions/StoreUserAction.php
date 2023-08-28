<?php

namespace App\Modules\Users\Actions;

use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\Model\User;

class StoreUserAction
{
    public static function execute(UserDTO $userDTO):User
    {
        return User::create($userDTO->toArrayWithoutNulls());
    }
}
