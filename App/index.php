<?php

include "loader.php";

include 'Views/header.php';

use App\Routes\Routes;


//if(isset($view)){
//    if(isset($viewParm)){
//        view($view,$viewParm);
//    } else {
//        view($view);
//    }
//
//}



Routes::get('nourddd-66','Me@ssssayHello');
Routes::get('nour-66','Me@sayHello');
Routes::get('nour-6ddd6','Me@sayHedllo');
Routes::run();
include 'Views/footer.php';

