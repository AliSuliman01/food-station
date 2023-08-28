<?php

namespace App\Modules\Users\Admins\Actions;

use App\Modules\Users\Admins\DTO\UserDTO;
use App\Modules\Users\Model\User;

class StoreAdminAction
{
    public static function execute(UserDTO $userDTO)
    {
        return User::create($userDTO->toArrayWithoutNulls());
    }
}
