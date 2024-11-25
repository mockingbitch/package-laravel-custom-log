<?php

namespace phongtran\Logger\app\Http\Traits;

/**
 * LogActivityTrait
 *
 * @package phongtran\Logger\app\Http\Traits
 * @copyright Copyright (c) 2024, jarvis.phongtran
 * @author phongtran <jarvis.phongtran@gmail.com>
 */
trait LogActivityTrait
{
    /**
     * Get route's information from request
     *
     * @param $route
     * @return array
     */
    public function routeToArray($route): array
    {
        return [
            'uri' => $route->uri(),
            'methods' => $route->methods(),
            'routeName' => $route->getName(),
            'action' => $route->getAction(),
            'parameters' => $route->parameters(),
            'middleware' => $route->gatherMiddleware(),
        ];
    }

    /**
     * Convert route details to a readable log string.
     *
     * @param array $routeArray
     * @return string
     */
    public function formatRouteLog(array $routeArray): string
    {
        return sprintf(
            "uri: %s, params: %s, method: %s, route: %s, handler: %s, middleware: %s",
            $routeArray['uri'] ?? 'unknown uri',
            implode(',', $routeArray['parameters'] ?? []) ?: '[]',
            $routeArray['methods'][0] ?? 'unknown method',
            $routeArray['routeName'] ?? 'unknown route',
            $routeArray['action']['controller'] ?? 'unknown handler',
            implode(',', self::removeValue($routeArray['middleware'], 'activity') ?? []) ?: '[]',

        );
    }

    /**
     * Remove value
     *
     * @param array $array
     * @param $value
     * @return array
     */
    public static function removeValue(array $array, $value): array
    {
        return array_values(array_filter($array, fn($v) => $v !== $value));
    }
}
