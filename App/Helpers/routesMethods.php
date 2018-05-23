<?php
use App\Routes\Routes;

    function get($route,$controller)
    {
        return Routes::get($route,$controller);
    }

    function post($route,$controller)
    {
        return Routes::post($route,$controller);
    }