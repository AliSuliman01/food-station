<?php

namespace App\Modules\Users\Actions;

use App\Enums\RoleEnum;
use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\Model\User;

class StoreUserAction
{
    public static function execute(UserDTO $userDTO, RoleEnum $role = null): User
    {
        /** @var User $user */
        $user = User::create($userDTO->toArrayWithoutNulls());
        if (isset($role)) {
            $user->assignRole($role->value);
        }

        return $user;
    }
}
