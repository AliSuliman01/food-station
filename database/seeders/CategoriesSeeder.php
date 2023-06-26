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
                'name' =>'home page filter' ,
                'slug' => 'home-page-filter-1',
            ],
            [
                'id' => 2,
                'name' =>'today products' ,
                'slug' => 'today-products-2',
            ],
            [
                'id' => 3,
                'name' =>'most bought products' ,
                'slug' => 'most-bought-products-3',
            ],
        ];
        Category::query()->upsert($data, ['id'], ['name', 'slug']);
    }
}
