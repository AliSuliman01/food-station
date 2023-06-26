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
                'id' => 1,
                'slug' => 'home-page-filter',
            ],
            [
                'id' => 2,
                'slug' => 'available-products',
            ],
            [
                'id' => 3,
                'slug' => 'most-bought-products',
            ],
        ];
        Category::query()->upsert($data, ['id']);
    }
}
