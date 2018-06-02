<?php
session_start();

use \Core\Factory;

    require "../../vendor/autoload.php";

    require "../../Core/Helpers/helper.php";

    Factory::runFlipWhoops();

    include '../Routes/web.php';

    $routing->run();    // Run Router;

    Factory::getDb();   // Run Database;
