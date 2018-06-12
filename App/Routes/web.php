<?php


/**
 * GET Section
 */


/**
 * Return To Index Page
*/
get('/','Me@layout');





$filesArray = [
    "admin",
    "me",
    "newsLetter",
    "skills",
    'tweet'
];

foreach ($filesArray as $key) {
    include $key.".php";
}

controller([
    "tweets"    => "tweets"
]);