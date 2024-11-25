<?php

namespace phongtran\Logger\app\Services;

use phongtran\Logger\app\Services\Models\Log;

class LogService extends AbsLogService
{
    public function store(string $channel, string $level, string $message = '')
    {
        return Log::create([
            'channel' => $channel,
            'level' => $level,
            'message' => $message,
            'activity_id' => request()->attributes->get('activity_id') ?? null,
        ]);
    }

    public function get()
    {
        return Log::all();
    }

    public function show(int $id)
    {
        return Log::find($id);
    }
}
