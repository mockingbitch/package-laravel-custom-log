<?php

namespace phongtran\Logger\app\Services\Definitions;

/**
 * LoggerConstants
 *
 * @package phongtran\Logger\app\Services\Definitions
 * @copyright Copyright (c) 2024, jarvis.phongtran
 * @author phongtran <jarvis.phongtran@gmail.com>
 */
interface LoggerConstants
{
    //TYPE
    const ACTIVITY = 'activity';
    const INFO = 'info';
    const WARNING = 'warning';
    const FATAL = 'fatal';
    const EXCEPTION = 'exception';
    const DEBUG = 'debug';
    const SQL = 'sql';

    //LEVEL
    const LEVEL_INFO = 'info';
    const LEVEL_WARNING = 'warning';
    const LEVEL_ERROR = 'error';
    const LEVEL_CRITICAL = 'critical';
    const LEVEL_ACTIVITY = 'activity';
    const LEVEL_DEBUG = 'debug';
}
