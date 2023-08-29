<?php

namespace App\Modules\Users\Actions;

use App\Enums\RoleEnum;
use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\Model\User;

class UpdateUserAction
{
    public static function execute(
        User $user, UserDTO $userDTO, RoleEnum $role = null
    ) {
        $user->update(array_null_filter($userDTO->toArray()));
        if (isset($role)) {
            $user->assignRole($role->value);
        }
        return $user;
    }
}
