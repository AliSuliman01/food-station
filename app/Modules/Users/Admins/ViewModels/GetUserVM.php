<?php

namespace App\Modules\Users\Admins\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

class GetUserVM implements Arrayable
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user->load(['restaurants']);
    }

    public function toArray()
    {
        return $this->user;
    }
}
