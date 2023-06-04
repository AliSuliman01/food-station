<?php

namespace App\Modules\Users\Actions;

use App\Modules\Users\DTO\UserLoginDTO;
use App\Modules\Users\Model\User;
use Illuminate\Support\Facades\Hash;

class SetNewAuthTokensAction
{
    public static function execute(
        User &$user
    ){
        $tokens = $user->createToken('access_token');

        $user->setAttribute('access_token', $tokens['access_token']);
        $user->setAttribute('refresh_token', $tokens['refresh_token']);

        return $user;

    }
}
