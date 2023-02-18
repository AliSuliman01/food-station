<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Images\Controllers\ImageController;

Route::apiResource('images',ImageController::class);
