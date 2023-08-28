<?php

namespace App\Modules\Users\Admins\Actions;

use App\Modules\Users\Admins\DTO\UserDTO;
use App\Modules\Users\Model\User;

class UpdateAdminAction
{
    public static function execute(
        User $user, UserDTO $userDTO
    ) {
        $user->update(array_null_filter($userDTO->toArray()));

        return $user;
    }
}
