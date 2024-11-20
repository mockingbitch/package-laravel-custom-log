<?php

namespace Feng\Logger;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\NoReturn;

class Logger
{
    #[NoReturn] public static function warning($level, $message = ''): void
    {
        Log::channel('fatal')->error(
            'Message: test'
        );

        dd($message);
    }
}
