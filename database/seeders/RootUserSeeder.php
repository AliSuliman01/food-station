<?php

namespace Database\Seeders;

use App\Modules\Users\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RootUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::query()->firstOrCreate([
            'email' => 'root@eatchen.com',
        ], [
            'name' => 'root',
            'username' => 'root',
            'email' => 'root@eatchen.com',
            'password' => Hash::make('123456'),

        ]);

    }
}