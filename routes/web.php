<?php

use Feng\Logger\Logger;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    dd(Config::get('logging'));
    Logger::warning('warning', 'Test message');
});
