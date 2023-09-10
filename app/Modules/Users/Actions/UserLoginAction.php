<?php

namespace App\Modules\Users\Actions;

use App\Modules\Users\DTO\UserLoginDTO;
use App\Modules\Users\Model\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class UserLoginAction
{
    public static function execute(
        UserLoginDTO $userLoginDTO
    ) {
        /** @var User $user */
        $user = User::query()->where('email', '=', $userLoginDTO->email)->first();

        if (! Hash::check($userLoginDTO->password, $user->password)) {
            throw new AuthenticationException(__('auth.failed'));
        }

        return $user;

    }
}
