<?php

use App\Http\Controllers\HomeController;
use phongtran\Logger\Logger;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'activity'], function () {
    Route::get('/', function () {
        Logger::warning('Test message');
        Logger::fatal('Test message');
        Logger::exception('Test message');
        Logger::debug('Test message');
        Logger::info('Test message');
    })->name('welcome');
    Route::get('/test/{id}', [HomeController::class, 'index']);
    Route::get('/as', [HomeController::class, 'test'])->name('welcome');
    Route::post('/test/{id}', [HomeController::class, 'post'])->name('post');
});
