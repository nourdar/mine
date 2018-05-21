<?php

use App\Controllers\MeController;

$me = new MeController;


    $viewParm = [
        'me'=> $me->me(),
        'Adminpage' => "me.php",
    ];



     $view = 'Admin/index';


