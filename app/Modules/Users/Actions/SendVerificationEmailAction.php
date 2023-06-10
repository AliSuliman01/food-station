<?php

namespace App\Modules\Users\Actions;

use App\Mail\EmailVerificationMail;
use App\Modules\Users\Model\User;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmailAction
{
    public static function execute(User $user)
    {

        $user->verification_code = random_int(100000, 999999);
        $user->save();

        Mail::to($user)->send(new EmailVerificationMail($user));
    }
}
