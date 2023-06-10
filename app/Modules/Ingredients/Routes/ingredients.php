<?php

use App\Modules\Ingredients\Controllers\AdminIngredientController;
use App\Modules\Ingredients\Controllers\IngredientController;
use Illuminate\Support\Facades\Route;

Route::resource('ingredients', IngredientController::class);

//Route::prefix('admin')->as('admin.')->group(function(){
//    Route::resource('ingredients', AdminIngredientController::class);
//});
