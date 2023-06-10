<?php

use App\Http\Controllers\ProfileController;
use App\Modules\Products\Model\Product;
use App\Modules\Settings\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('find-food');
})->name('find-food');

Route::get('/tracking', function () {
    return view('tracking');
})->name('tracking');

Route::get('/find-restaurant', function () {
    return view('find-restaurant');
})->name('find-restaurant');

Route::get('/location', function () {
    return view('location');
})->name('location');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('products/{product}', function (Product $product) {
    return view('product.show', [
        'product' => $product,
    ]);
})->name('product.show');

Route::get('/cart', function () {
    return view('cart');
})->middleware(['auth', 'verified'])->name('cart');

Route::get('/settings', function () {
    return view('settings');
})->middleware(['auth', 'verified'])->name('settings.edit');

Route::post('/settings', [SettingController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('settings');

Route::get('products/order/{product}', function (Product $product) {
    return view('product.order', [
        'product' => $product,
    ]);
})->middleware(['auth', 'verified'])->name('products.order');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
