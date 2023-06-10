<?php

use App\Modules\Restaurants\Controllers\AdminRestaurantController;
use App\Modules\Restaurants\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::resource('restaurants', RestaurantController::class);

//Route::prefix('admin')->as('admin.')->group(function(){
//    Route::resource('restaurants', AdminRestaurantController::class);
//});
