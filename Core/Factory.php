<?php
namespace Core;

class Factory
{
    private static $route;

    public static function getRoute()
    {
        if (is_null(self::$route)) {
            $route = new Routes\Route();
            return self::$route = $route;
        }

        return self::$route;
    }

}