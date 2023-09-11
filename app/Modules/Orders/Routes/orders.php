<?php

use App\Modules\Orders\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('orders')
    ->middleware('auth:api')
    ->group(function () {
        Route::get('userOrder/{user}', [OrderController::class, 'userOrders']);
        Route::post('store_custom', [OrderController::class, 'store_custom']);
    });
Route::middleware('auth:api')
    ->apiResource('orders', OrderController::class)
    ->except('update');
