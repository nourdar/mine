<?php


//include "loader.php";

//include '../Views/header.php';


$string = "amine/{id}/younes/{id22}";

$pattern = "/{([A-z-0-9]*)}/";

$array = array();

$result = preg_match($pattern,$string,$array);
$result = preg_replace($pattern,'var',$string);

echo "<pre>";
echo var_dump($result);
echo var_dump($array);
echo "</pre>";

//include '../Views/footer.php';





