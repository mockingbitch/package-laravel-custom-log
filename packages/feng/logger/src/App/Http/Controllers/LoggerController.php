<?php

namespace Feng\Logger\App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class LoggerController
{
    public function index(): View|Factory|Application
    {
        return view('vendor.logger.index');
    }
}
