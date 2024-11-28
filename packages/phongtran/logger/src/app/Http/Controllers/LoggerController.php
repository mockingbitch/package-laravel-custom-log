<?php

namespace phongtran\Logger\app\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;
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
    ) {}

    /**
     * Logger dashboard
     *
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        $channel = request()->query('channel');
        $logs = app()->call([$this->logService, 'get'], ['channel' => $channel]);

        return view('logger.index', [
            'logs' => $logs,
            'currentChannel' => $channel,
        ]);
    }

    /**
     * Detail log
     *
     * @param $id
     * @return Factory|View|Application
     */
    public function detail($id): Factory|View|Application
    {
        $log = app()->call([$this->logService, 'show'], ['id' => $id]);

        return view('logger.detail', [
            'log' => $log,
        ]);
    }
}
