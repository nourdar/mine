<?php
function randomUserIcon(){
    $array  = [
        'index_1.png',
        'index_1.png',
        'index_1.png',
        'index_1.png',
        'index_1.png',
        'index_1.png',
        'index_1.png',
        'index_1.png',
        'index_1.png',
        'index_1.png',
    ];
    $rand = floor(rand(0,9));
    return icon($array[$rand],'Users');
}

function auth($column)
{
    if (isset($_SESSION['AUTH_ME'])) {
        return me($column);
    } else {
        \Core\Factory::visitors($column);
    }
}

function visitors()
{
    $array = [
        'id'            => 2,
        'user_group'    => "visitors",
    ];

    return $array;
}