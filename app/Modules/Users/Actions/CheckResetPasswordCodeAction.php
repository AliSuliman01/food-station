<?php

namespace App\Modules\Users\Actions;

use App\Exceptions\InvalidVerificationCodeException;
use App\Modules\Users\Model\User;

class CheckResetPasswordCodeAction
{
    public static function execute(User $user, string $reset_password_code)
    {
        return $user->reset_password_code == $reset_password_code
            && now()->isBefore($user->reset_password_code_expired_at);
    }
}
