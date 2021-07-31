<?php

namespace Core;


class Route {

    public static function process($request_uri, $routing_arr) {
        $matches = array();
        foreach ($routing_arr as $route => $controller_info) {
            $matches = array();                       
            if (preg_match("@^/{$route}$@u", $request_uri, $matches)) {
                if (isset($controller_info[2])) {
                    $params = $controller_info[2];
                } elseif (count($matches) >= 1) {
                    unset($matches[0]);
                    $controller_info[2] = $matches;
                } else {
                    $controller_info[2] = array();
                }
                
                return $controller_info;
            }
        }
    }

}
