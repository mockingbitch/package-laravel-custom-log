<?php

namespace phongtran\Logger;

use Illuminate\Support\Facades\Log;
use phongtran\Logger\app\Services\AbsLogService;

/**
 * Logger
 *
 * @package phongtran\Logger
 * @copyright Copyright (c) 2024, jarvis.phongtran
 * @author phongtran <jarvis.phongtran@gmail.com>
 */
class Logger
{
    /**
     * Format backtrace info
     *
     * @param array $backtrace
     * @return string
     */
    private static function formatBacktrace(array $backtrace = []): string
    {
        $caller = $backtrace[1] ?? [];
        $file = isset($caller['file'])
            ? str_replace(base_path() . DIRECTORY_SEPARATOR, '', $caller['file'])
            : 'unknown file';
        $line = $caller['line'] ?? 'unknown line';

        return "<{$file} (Line:{$line})>";
    }

    /**
     * Write log to the specified channel and level.
     *
     * @param string $channel
     * @param string $level
     * @param string $message
     * @return mixed
     */
    private static function log(string $channel, string $level, string $message): mixed
    {
        $logService = app(AbsLogService::class);
        $logMessage = $channel === 'activity'
            ? json_encode($message)
            : self::formatBacktrace(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)) . " {$message}";
        Log::channel($channel)->log($level, $logMessage);

        return app()->call([$logService, 'store'], [
            'channel' => $channel,
            'level' => $level,
            'message' => $logMessage,
        ]);
    }

    /**
     * Log a warning message.
     *
     * @param string $message
     * @return void
     */
    public static function warning(string $message = ''): void
    {
        self::log('warning', 'warning', $message);
    }

    /**
     * Log a fatal error message.
     *
     * @param string $message
     * @return void
     */
    public static function fatal(string $message = ''): void
    {
        self::log('fatal', 'critical', $message);
    }

    /**
     * Log an exception message.
     *
     * @param string $message
     * @return void
     */
    public static function exception(string $message = ''): void
    {
        self::log('exception', 'error', $message);
    }

    /**
     * Log a debug message.
     *
     * @param string $message
     * @return void
     */
    public static function debug(string $message = ''): void
    {
        self::log('debug', 'debug', $message);
    }

    /**
     * Log an informational message.
     *
     * @param string $message
     * @return void
     */
    public static function info(string $message = ''): void
    {
        self::log('info', 'info', $message);
    }

    /**
     * Log an activity message.
     *
     * @param string $message
     * @return mixed
     */
    public static function activity(string $message = ''): mixed
    {
        return self::log('activity', 'info', $message);
    }
}
