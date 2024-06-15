<?php

if (!function_exists('is_active_route')) {
    function is_active_route($route)
    {
        $uri = service('uri');
        $segments = explode('/', $route);

        foreach ($segments as $index => $segment) {
            if ($uri->getSegment($index + 1) !== $segment) {
                return false;
            }
        }
        return true;
    }
}
