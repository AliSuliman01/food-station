<?php

namespace App\Modules\Users\Actions;

use App\Exceptions\InvalidVerificationCodeException;
use App\Modules\Users\Model\User;
use Illuminate\Support\Str;

class GenerateResetPasswordTokenAction
{
    public static function execute(User $user)
    {
        $user->reset_password_token = Str::random();
        $user->reset_password_token_expired_at = now()->addMinutes(5)->toDateTimeString();
        $user->save();

        return $user->reset_password_token;
    }
}
