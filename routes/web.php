<?php

use App\Http\Controllers\HomeController;
use Feng\Logger\Logger;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'activity'], function () {
    Route::get('/', function () {
        Logger::warning('Test message');
        Logger::fatal('Test message');
        Logger::exception('Test message');
        Logger::debug('Test message');
        Logger::info('Test message');
    })->name('welcome');
    Route::get('/test/{id}', [HomeController::class, 'index'])->name('welcome');
    Route::post('/test/{id}', [HomeController::class, 'post'])->name('post');
});
