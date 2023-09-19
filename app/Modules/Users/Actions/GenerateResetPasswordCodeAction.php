<?php

namespace App\Modules\Users\Actions;

use App\Exceptions\InvalidVerificationCodeException;
use App\Modules\Users\Model\User;

class GenerateResetPasswordCodeAction
{
    public static function execute(User $user)
    {
        $user->reset_password_code = '123456';
        $user->reset_password_code_expired_at = now()->addMinutes(5)->toDateTimeString();
        $user->save();

        return $user;
    }
}
