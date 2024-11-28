<?php

namespace phongtran\Logger\app\Services;

use phongtran\Logger\app\Services\Models\Log;

class LogService extends AbsLogService
{
    /**
     * Store log into database
     *
     * @param string $channel
     * @param string $level
     * @param string $message
     * @return mixed
     */
    public function store(string $channel, string $level, string $message = ''): mixed
    {
        return Log::create([
            'channel' => $channel,
            'level' => $level,
            'message' => $message,
            'activity_id' => request()->attributes->get('activity_id') ?? null,
        ]);
    }

    /**
     * Get all with paginate
     *
     * @param string|null $channel
     * @return mixed
     */
    public function get(string $channel = null): mixed
    {
        if ($channel) {
            return Log::where('channel', $channel)->paginate(20)->withQueryString();
        }

        return Log::paginate(20)->withQueryString();
    }

    /**
     * Show detail
     *
     * @param int $id
     * @return Log|null
     */
    public function show(int $id): ?Log
    {
        return Log::with(['log'])->find($id);
    }

    /**
     * Update activity log
     *
     * @param int $id
     * @param $executionTime
     * @param array $response
     * @return Log|null
     */
    public function updateActivity(int $id, $executionTime, array $response = []): ?Log
    {
        $log = $this->show($id);
        $log->execution_time = $executionTime;
        $log->response = json_encode($response);
        $log->save();

        return $log;
    }
}
