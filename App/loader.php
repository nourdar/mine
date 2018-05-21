<?php
session_start();
require "../vendor/autoload.php";
require "Helpers/helper.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();