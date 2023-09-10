<?php

use App\Modules\Media\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::prefix('media')
    ->group(function () {
        Route::post('upload_image', [MediaController::class, 'uploadImage']);
    });
