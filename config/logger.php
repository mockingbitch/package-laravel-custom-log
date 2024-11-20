<?php

use Feng\Logger\LogFormatter;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [
        'sql' => [
            'driver' => 'daily',
            'path' => storage_path('logs/sql.log'),
            'level' => 'info',
            'tap' => [
                LogFormatter::class.':'.implode(',', [
                    "datetime:%datetime%\t%message%".PHP_EOL,
                    'Y/m/d H:i:s',
                ]),
            ],
        ],

        'warning' => [
            'driver' => 'single',
            'path' => storage_path('logs/warn.log'),
            'level' => 'notice',
            'tap' => [
                LogFormatter::class.':'.implode(',', [
                    '[%datetime%] [%level_name%] %extra.class% <%extra.function%(%extra.line%)> %message% %context%'.PHP_EOL,
                    'Y-m-d H:i:s:v',
                ]),
            ],
        ],

        'info' => [
            'driver' => 'single',
            'path' => storage_path('logs/info.log'),
            'tap' => [
                LogFormatter::class.':'.implode(',', [
                    '[%datetime%] [%level_name%] %message% %context%'.PHP_EOL,
                    'Y/m/d H:i:s',
                ]),
            ],
        ],

        'fatal' => [
            'driver' => 'daily',
            'path' => storage_path('logs/fatal.log'),
            'level' => 'error',
            'tap' => [
                LogFormatter::class.':'.implode(',', [
                    '[%datetime%] [%level_name%] %message% %context%'.PHP_EOL,
                    'Y-m-d H:i:s:v',
                ]),
            ],
        ],

        'exception' => [
            'driver' => 'daily',
            'path' => storage_path('logs/exception.log'),
            'level' => 'warning',
            'tap' => [
                LogFormatter::class.':'.implode(',', [
                    //                    '[%datetime%] [%level_name%] %extra.class% <%extra.function%(%extra.line%)> %message% %context%' . PHP_EOL,
                    '[%datetime%] [%level_name%] %message% %context%'.PHP_EOL,
                    'Y-m-d H:i:s:v',
                ]),
            ],
        ],
    ],

];
