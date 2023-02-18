<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Modules\Images\Model\Image;
use App\Modules\Products\Model\Product;
use App\Modules\Translations\Model\Translation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Product::factory(10)
            ->create(['user_id' => User::query()->first()->id])
            ->each(function (Product $product) {
                Translation::factory(2)->create([
                    'translatable_type' => $product->getMorphClass(),
                    'translatable_id' => $product->id
                ]);
                Image::factory(2)->create([
                    'imagable_type' => $product->getMorphClass(),
                    'imagable_id' => $product->id
                ]);
            });
    }
}
