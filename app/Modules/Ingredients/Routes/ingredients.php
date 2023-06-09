<?php

use App\Modules\Ingredients\Controllers\AdminIngredientController;
use Illuminate\Support\Facades\Route;
use App\Modules\Ingredients\Controllers\IngredientController;

Route::resource('ingredients',IngredientController::class);

//Route::prefix('admin')->as('admin.')->group(function(){
//    Route::resource('ingredients', AdminIngredientController::class);
//});
