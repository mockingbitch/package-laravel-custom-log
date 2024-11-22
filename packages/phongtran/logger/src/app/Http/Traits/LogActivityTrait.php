<?php

namespace phongtran\Logger\app\Http\Traits;

trait LogActivityTrait
{
    /**
     * Get route's information from request
     *
     * @param $route
     * @return array
     */
    private function routeToArray($route): array
    {
        return [
            'uri' => $route->uri(),
            'methods' => $route->methods(),
            'routeName' => $route->getName(),
            'action' => $route->getAction(),
            'parameters' => $route->parameters(),
//            'middleware' => $route->gatherMiddleware(),
        ];
    }

    /**
     * Convert route details to a readable log string.
     *
     * @param array $routeArray
     * @return string
     */
    private function formatRouteLog(array $routeArray): string
    {
        return sprintf(
            "uri: %s, params: %s, method: %s, route: %s, handler: %s",
            $routeArray['uri'] ?? 'unknown uri',
            implode(',', $routeArray['parameters'] ?? []) ?: 'unknown parameters',
            $routeArray['methods'][0] ?? 'unknown method',
            $routeArray['routeName'] ?? 'unknown route',
            $routeArray['action']['controller'] ?? 'unknown handler'
        );
    }
}
