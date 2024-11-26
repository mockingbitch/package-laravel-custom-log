<?php

namespace phongtran\Logger\app\Listeners;

use Illuminate\Support\Facades\Log;
use phongtran\Logger\app\Watcher\RequestWatcher;

class RequestListener
{
    public function handle(RequestWatcher $event): void
    {
        // Lấy thông tin từ response
        $response = $event->response;
        $statusCode = $response->getStatusCode();
        $content = $response->getContent();
        $headers = $response->headers->all();
dd($response);
        // Ghi log thông tin về response
        Log::info('Response Tracked', [
            'status' => $statusCode,
            'content' => $content,
            'headers' => $headers
        ]);
    }
}
