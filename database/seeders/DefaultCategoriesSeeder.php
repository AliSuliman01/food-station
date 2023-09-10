<?php

namespace Database\Seeders;

use App\Enums\CategoryEnum;
use App\Modules\Categories\Model\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DefaultCategoriesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (CategoryEnum::asArray() as $value) {
            Category::query()->firstOrCreate([
                'name' => $value,
            ], [
                'slug' => Str::slug($value.' '.time()),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
        }

    }
}
