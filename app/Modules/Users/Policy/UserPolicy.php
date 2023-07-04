<?php

namespace App\Modules\Users\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Modules\Users\Model\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return true;
    }
    public function show(User $user)
    {
        return true;
    }
    public function create(User $user)
    {
        return true;
    }
    public function update(User $user)
    {
        return true;
    }
    public function delete(User $user)
    {
        return true;
    }
}
