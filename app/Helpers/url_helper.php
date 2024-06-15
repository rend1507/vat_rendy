<?php

if (!function_exists('is_active_route')) {
    function is_active_route($route, $isFull = false)
    {
        $uri = service('uri');
        $segments = explode('/', $route);

        if(!$isFull){
            foreach ($segments as $index => $segment) {
                if ($uri->getSegment($index + 1) !== $segment) {
                    return false;
                }
            }
        }else{
            if (ltrim($uri->getPath(), '/') !== ltrim($route, '/')) {
                return false;
            }
        }
        return true;
    }
}
