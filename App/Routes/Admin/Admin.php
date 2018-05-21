<?php
use App\Controllers\MeController;

$me = new MeController;

$viewParm = [
    'me'=> $me->me()
];


if(isset($_GET['admin'])) {

    $admin = $_GET['admin'];


    if($admin == "me"){
          include "Me.php";
    }
    if($admin == "meUpdate"){

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            if($me->update($_POST)){
                $_SESSION['op_message'] = $successMessage;
                include "Me.php";
            } else {
                $_SESSION['op_message'] = $errorMessage;
                include "Me.php";
            }
        }

    }






    $view = "Admin/index";
}

