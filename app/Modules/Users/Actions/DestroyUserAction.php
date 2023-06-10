<?php

namespace App\Modules\Users\Actions;

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
