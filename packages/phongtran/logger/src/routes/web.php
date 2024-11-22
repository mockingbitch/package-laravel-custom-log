<?php

use phongtran\Logger\App\Http\Controllers\LoggerController;
use Illuminate\Support\Facades\Route;

Route::get('index', [LoggerController::class, 'index']);
