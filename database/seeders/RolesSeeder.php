<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Modules\Users\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (RoleEnum::asArray() as $item) {
            Role::findOrCreate($item);
        }
    }
}
