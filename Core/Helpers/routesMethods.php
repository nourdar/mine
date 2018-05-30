<?php
use Core\Factory;

$routing = Factory::getRoute();


function get($route, $controller)
{
    global $routing;
    return $routing->get($route, $controller);
}

function post($route, $controller)
{
    global $routing;
    return $routing->post($route, $controller);
}


