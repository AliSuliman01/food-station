<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Modules\Users\Model\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function userOrders(User $authUser, User $user)
    {
        return $authUser->hasRole(RoleEnum::ADMIN) ||
            ($authUser->hasRole(RoleEnum::CUSTOMER) && $authUser->id == $user->id);
    }
}
