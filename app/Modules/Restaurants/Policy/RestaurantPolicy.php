<?php

namespace App\Modules\Restaurants\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Modules\Users\Model\User;

final class RestaurantPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }
}
