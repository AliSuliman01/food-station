<?php

use App\Modules\Products\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Modules\Products\Controllers\ProductController;

Route::middleware(['auth:api'])->prefix('products')->group(function(){
    Route::get('', [ProductController::class]);
});

Route::resource('products',ProductController::class);

Route::prefix('admin')->as('admin.')->group(function(){
   Route::resource('products', AdminProductController::class);
});
