<?php

namespace App\Modules\Users\Admins\ViewModels;

use App\Modules\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;

class GetUserByEmailVM implements Arrayable
{
    private $user;

    public function __construct($email)
    {
        $this->user = User::query()->where('email', '=', $email)->first();
    }

    public function toArray()
    {
        return $this->user;
    }
}
