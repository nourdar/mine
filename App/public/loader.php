<?php
session_start();

use Core\Routes\Route;

require "../../vendor/autoload.php";


require "../../Core/Helpers/helper.php";






$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


include '../Routes/web.php';



$routing->run();
