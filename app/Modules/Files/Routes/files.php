<?php

use App\Modules\Files\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::prefix('files')->group(function(){

    Route::post('upload', [FileController::class, 'upload']);

});
