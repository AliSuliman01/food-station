<?php

use App\Modules\Images\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::apiResource('images', ImageController::class);
