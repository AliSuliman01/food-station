<?php

namespace App\Modules\Restaurants\Policy;

use App\Modules\Users\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class RestaurantPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user)
    {
        return true;
    }
}
