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

function getPages()
{
    global $routing;
    $route = $routing->matched;

    $result = explode('/', $route['URI']);


    for ($i = 0; $i < count($result); $i++) {
        $last = ($i === 0 )? $u = 0 : $u = $i-1;
        if ($i === 0) {
            $array[$i] = ['text'=> $result[$i],'url'=> $result[$i]];
        } else {
            $array[$i] = ['text'=> $result[$i],'url'=> $array[$last]['url']."/".$result[$i]];
        }
    }
    if (empty($route['VARIABLES_KEYSES'])) {
        $final = count($result);
    } else {
        $var = $route['VARIABLES_KEYSES'];
        $final = count($result) - count($route['VARIABLES_KEYSES']);
        for ($i = 0; $i < count($var); $i++) {
            $array[$var[$i]]['text'] =  $array[$last]['text'];
            //unset( $array[$last]);
        }
    }
    return $array;
}



