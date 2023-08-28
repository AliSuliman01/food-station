<?php

namespace App\Modules\Users\Admins\Actions;

use App\Modules\Users\Admins\DTO\UserDTO;
use App\Modules\Users\Model\User;

class DestroyUserAction
{
    public static function execute(
        User $user
    ) {
        $user->delete();
        return $user;
    }
}
