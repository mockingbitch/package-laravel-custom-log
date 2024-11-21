<?php

namespace Feng\Logger;

use Feng\Logger\App\Http\Middleware\LogActivity;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    const DISABLE_DEFAULT_ROUTES_CONFIG = 'feng-logger.disableRoutes';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected bool $defer = false;

    /**
     * The event listener mappings for the applications auth sca-folding.
     *
     * @var array
     */
    protected array $listeners = [

        'Illuminate\Auth\Events\Attempting' => [
            'Feng\Logger\App\Listeners\LogAuthenticationAttempt',
        ],

        'Illuminate\Auth\Events\Authenticated' => [
            'Feng\Logger\App\Listeners\LogAuthenticated',
        ],

        'Illuminate\Auth\Events\Login' => [
            'Feng\Logger\App\Listeners\LogSuccessfulLogin',
        ],

        'Illuminate\Auth\Events\Failed' => [
            'Feng\Logger\App\Listeners\LogFailedLogin',
        ],

        'Illuminate\Auth\Events\Logout' => [
            'Feng\Logger\App\Listeners\LogSuccessfulLogout',
        ],

        'Illuminate\Auth\Events\Lockout' => [
            'Feng\Logger\App\Listeners\LogLockout',
        ],

        'Illuminate\Auth\Events\PasswordReset' => [
            'Feng\Logger\App\Listeners\LogPasswordReset',
        ],

    ];

    /**
     * Bootstrap the application services.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router): void
    {
        $router->middlewareGroup('activity', [LogActivity::class]);
//        $this->loadTranslationsFrom(__DIR__.'/resources/lang/', 'Logger');
        if (Config::get('logger')) {
            Config::set('logging', array_merge(
                Config::get('logging'),
                Config::get('logger')
            ));
            QueryDebugger::setup();
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        if (file_exists(config_path('logger.php'))) {
            $this->mergeConfigFrom(config_path('logger.php'), 'Logger');
        } else {
            $this->mergeConfigFrom(__DIR__ . '/config/logger.php', 'Logger');
        }

        if (!config(self::DISABLE_DEFAULT_ROUTES_CONFIG)) {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        }

        $this->app->singleton('logger', function ($app) {
            return new Logger();
        });

//        $this->loadViewsFrom(__DIR__.'/resources/views/', 'Logger');
//        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->registerEventListeners();
        $this->publishFiles();
    }

    /**
     * Get the list of listeners and events.
     *
     * @return array
     */
    private function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * Register the list of listeners and events.
     *
     * @return void
     */
    private function registerEventListeners(): void
    {
//        $listeners = $this->getListeners();
//        foreach ($listeners as $listenerKey => $listenerValues) {
//            foreach ($listenerValues as $listenerValue) {
//                Event::listen(
//                    $listenerKey,
//                    $listenerValue
//                );
//            }
//        }
    }

    /**
     * Publish files for Laravel Logger.
     *
     * @return void
     */
    private function publishFiles(): void
    {
        $publishTag = 'Logger';

        $this->publishes([
            __DIR__ . '/config/logger.php' => base_path('config/logger.php'),
        ], $publishTag);

        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/logger/' . $publishTag),
        ], $publishTag);

        $this->publishes([
            __DIR__.'/database/migrations' => base_path('database/migrations/' . $publishTag),
        ], $publishTag);
//
//        $this->publishes([
//            __DIR__.'/resources/lang' => base_path('resources/lang/vendor/'.$publishTag),
//        ], $publishTag);
    }
}
