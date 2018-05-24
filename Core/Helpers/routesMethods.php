<?php
use Core\Routes\Route;

    function get($route,$controller)
    {
        return Route::get($route,$controller);
    }

    function post($route,$controller)
    {
        return Route::post($route,$controller);
    }