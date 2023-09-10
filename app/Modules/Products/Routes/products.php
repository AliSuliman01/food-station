<?php

use App\Modules\Products\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    Route::prefix('products')->group(function () {

        Route::get('', [ProductController::class, 'index']);
        Route::get('available', [ProductController::class, 'available']);
        Route::get('popular', [ProductController::class, 'popular']);

    });

    Route::resource('products', ProductController::class);

});

