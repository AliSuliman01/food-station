<?php

use App\Modules\Products\Controllers\AdminProductController;
use App\Modules\Products\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index']);
    Route::get('available', [ProductController::class, 'available']);
    Route::get('most_bought', [ProductController::class, 'most_bought']);
});

Route::resource('products', ProductController::class);
//
//Route::prefix('admin')->as('admin.')->group(function(){
//   Route::resource('products', AdminProductController::class);
//});
