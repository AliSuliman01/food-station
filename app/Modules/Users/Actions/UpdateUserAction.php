<?php

namespace App\Modules\Users\Actions;

use App\Modules\Users\DTO\UserDTO;
use App\Modules\Users\Model\User;

class UpdateUserAction
{
    public static function execute(
        User $user, UserDTO $userDTO
    ) {
        $user->update(array_null_filter($userDTO->toArray()));

        return $user;
    }
}
