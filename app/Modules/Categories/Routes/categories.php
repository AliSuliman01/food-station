<?php

use App\Modules\Categories\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Modules\Categories\Controllers\CategoryController;

Route::resource('categories',CategoryController::class);

Route::prefix('admin')->as('admin.')->group(function(){
    Route::get('dive_or_edit/{category}', [AdminCategoryController::class, 'dive_or_edit'])->name('categories.dive_or_edit');
    Route::get('index_from_root/{root}', [AdminCategoryController::class, 'index'])->name('categories.index_from_root');
    Route::resource('categories', AdminCategoryController::class);
});
