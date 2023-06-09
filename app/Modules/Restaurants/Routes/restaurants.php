<?php

use App\Modules\Restaurants\Controllers\AdminRestaurantController;
use Illuminate\Support\Facades\Route;
use App\Modules\Restaurants\Controllers\RestaurantController;

Route::resource('restaurants',RestaurantController::class);

//Route::prefix('admin')->as('admin.')->group(function(){
//    Route::resource('restaurants', AdminRestaurantController::class);
//});
