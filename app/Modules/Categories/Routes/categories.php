<?php

use App\Modules\Categories\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('categories')->group(function(){
   Route::get('ingredients', [CategoryController::class, 'ingredients']);
});
Route::resource('categories', CategoryController::class);
