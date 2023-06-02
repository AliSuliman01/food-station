<?php

namespace App\Modules\Users\Actions;

use App\Exceptions\GeneralException;
use App\Modules\Users\DTO\UserLoginDTO;
use App\Modules\Users\Model\User;
use Illuminate\Support\Facades\Hash;

class UserLoginAction
{
    public static function execute(
        UserLoginDTO $userLoginDTO
    ){
        /** @var User $user */
        $user = User::query()->where('mobile_phone', '=', $userLoginDTO->mobile_phone)->firstOrFail();

        if (!Hash::check($userLoginDTO->password, $user->password))
            throw new \Exception(__('auth.failed'));


        $tokens = $user->createToken('access-token');

        $user->setAttribute('access_token', $tokens['access_token']);
        $user->setAttribute('refresh_token', $tokens['refresh_token']);

        return $user;

    }
}
