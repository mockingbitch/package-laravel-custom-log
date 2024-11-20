<?php

namespace Feng\Logger;

use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\NoReturn;

class Logger
{
    #[NoReturn] public static function warning($level, $message = ''): void
    {
        dd(debug_backtrace());
        Log::channel('fatal')->error(
            'Message: test'
        );
    }
}
