<?php

namespace App\Modules\Users\Actions;

use App\Modules\Users\Model\User;
use App\Modules\Users\DTO\UserDTO;

class UpdateUserAction
{
    public static function execute(
        User $user,UserDTO $userDTO
    ){
        $user->update(array_null_filter($userDTO->toArray()));
        return $user;
    }
}
