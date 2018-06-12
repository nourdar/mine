<?php
session_start();

use \Core\Factory;

require "../vendor/autoload.php";
require "../Core/Helpers/helper.php";

Factory::runFlipWhoops();

include '../App/Routes/web.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $routing->runPost(); // Run Router With POST Method To Handle POST Request;
} else {
    $routing->run();    // Run Router With GET Method;
}


Factory::getDb();   // Run Database;
