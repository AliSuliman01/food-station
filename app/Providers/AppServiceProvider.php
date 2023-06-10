<?php

namespace App\Providers;

use App\Modules\Ingredients\Model\Ingredient;
use App\Modules\Products\Model\Product;
use App\Modules\Restaurants\Model\Restaurant;
use App\Modules\Users\Model\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (file_exists(__DIR__.'/migrations.json')) {
            $this->loadMigrationsFrom(json_decode(file_get_contents(__DIR__.'/migrations.json'), true));
        }

        Relation::enforceMorphMap([
            'product' => Product::class,
            'restaurant' => Restaurant::class,
            'user' => User::class,
            'ingredient' => Ingredient::class,
        ]);
    }
}
