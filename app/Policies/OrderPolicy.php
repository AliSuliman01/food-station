<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Order;
use App\Modules\Users\Model\User;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Modules\Users\Model\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Modules\Users\Model\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Modules\Users\Model\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }
    public function store_custom(User $user)
    {
        return $user->hasRole(RoleEnum::CUSTOMER());
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Modules\Users\Model\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Modules\Users\Model\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Modules\Users\Model\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Modules\Users\Model\User  $user
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Order $order)
    {
        //
    }
}
