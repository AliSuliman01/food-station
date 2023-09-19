<?php

namespace App\Modules\Users\Actions;

use App\Exceptions\InvalidVerificationCodeException;
use App\Modules\Users\Model\User;

class CheckResetPasswordTokenAction
{
    public static function execute(User $user, string $reset_password_token)
    {
        return $user->reset_password_token == $reset_password_token
            && now()->isBefore($user->reset_password_token_expired_at);
    }
}
