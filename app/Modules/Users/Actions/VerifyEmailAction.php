<?php

namespace App\Modules\Users\Actions;

use App\Exceptions\InvalidVerificationCodeException;
use App\Mail\EmailVerificationMail;
use App\Modules\Users\Model\User;
use Illuminate\Support\Facades\Mail;

class VerifyEmailAction
{
    public static function execute(User $user, $verification_code)
    {
        if ($user->verification_code != $verification_code)
            throw new InvalidVerificationCodeException();

        $user->verification_code = null;
        $user->email_verified_at = now()->toDateTimeString();
        $user->save();

        return $user;
    }
}
