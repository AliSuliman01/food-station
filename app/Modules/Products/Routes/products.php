<?php

use App\Modules\Products\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Modules\Products\Controllers\ProductController;

Route::resource('products',ProductController::class);

Route::prefix('admin')->as('admin.')->group(function(){
   Route::resource('products', AdminProductController::class);
});
