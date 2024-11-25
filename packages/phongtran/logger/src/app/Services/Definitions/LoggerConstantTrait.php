<?php

namespace phongtran\Logger\app\Services\Definitions;

/**
 * LoggerConstantTrait
 *
 * @package phongtran\Logger\app\Services\Definitions
 * @copyright Copyright (c) 2024, jarvis.phongtran
 * @author phongtran <jarvis.phongtran@gmail.com>
 */
trait LoggerConstantTrait
{
    /**
     * Get log badge level
     *
     * @param $level
     * @return string
     */
    public static function getLogBadgeLevel($level): string
    {
        $levelClasses = [
            'info' => 'success',
            'critical' => 'danger',
            'error' => 'danger',
            'activity' => 'success',
            'warning' => 'warning',
            'debug' => 'info',
        ];

        return $levelClasses[$level] ?? 'info';
    }
}
