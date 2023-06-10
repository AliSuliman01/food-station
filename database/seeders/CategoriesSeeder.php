<?php

namespace Database\Seeders;

use App\Modules\Categories\Model\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'slug' => 'filter',
            ],
        ];
        Category::query()->insertOrIgnore($data);
    }
}
