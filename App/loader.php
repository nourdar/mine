<?php
session_start();

use App\Routes\Routes;

require "../vendor/autoload.php";







$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


require "Helpers/helper.php";

include 'Routes/web.php';

Routes::run();