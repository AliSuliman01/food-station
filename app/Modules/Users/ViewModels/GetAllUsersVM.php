<?php

namespace App\Modules\Users\ViewModels;

use App\Modules\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;

class GetAllUsersVM implements Arrayable
{
    public function toArray()
    {
        $users = User::query()
            ->when(request()->filter, function ($query) {
                $query->where('name', 'like', '%'.request()->filter.'%');
            })
            ->latest()
            ->get();

        return [
            'users' => $users,
        ];
    }
}
