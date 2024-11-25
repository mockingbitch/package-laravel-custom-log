<?php

namespace phongtran\Logger\facades;

use Illuminate\Support\Facades\Facade;

/**
 * Logger Facade
 *
 * @package phongtran\Logger\facades
 * @copyright Copyright (c) 2024, jarvis.phongtran
 * @author phongtran <jarvis.phongtran@gmail.com>
 */
class Logger extends Facade
{
    /**
     * Get Facade Accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'logger';
    }
}
