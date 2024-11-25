<?php

namespace phongtran\Logger\app\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use phongtran\Logger\app\Services\AbsLogService;

/**
 * Logger Controller
 *
 * @package phongtran\Logger\app\Http\Controllers
 * @copyright Copyright (c) 2024, jarvis.phongtran
 * @author phongtran <jarvis.phongtran@gmail.com>
 */
class LoggerController
{
    /**
     * Constructor
     *
     * @param AbsLogService $logService
     */
    public function __construct(
        protected AbsLogService $logService,
    )
    {

    }

    /**
     * Logger dashboard
     *
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        $logs = app()->call([$this->logService, 'get']);

        return view('logger.index', compact('logs'));
    }

    public function getLog($type): Factory|View|Application
    {
        dd($type);
    }
}
