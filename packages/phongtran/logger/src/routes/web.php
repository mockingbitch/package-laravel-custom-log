<?php

use phongtran\Logger\App\Http\Controllers\LoggerController;
use Illuminate\Support\Facades\Route;

Route::prefix('logger')->group(function () {
    Route::get('/', [LoggerController::class, 'index']);
    Route::get('/{type}', [LoggerController::class, 'getLog'])
        ->whereIn('type', ['sql', 'warning', 'exception', 'info', 'debug', 'activity']);
});
