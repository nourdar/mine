<?php

    function css ($file) {
        if(file_exists("assets/css/".$file.".css")) {
            echo "<link href='assets/css/".$file.".css' rel='stylesheet'/>";
        } else {
             echo "there is no css file " . $file.".css";
        }
    }

    function js ($file) {
        if(file_exists("assets/js/".$file.".js")) {
            echo "<script src='assets/js/".$file.".js' /></script>";
        } else {
            echo "there is no js file " . $file.".js";
        }
    }



    function view ($file,$viewParm = null) {
        if(file_exists("Views/".$file.".php")) {
            if(is_array($viewParm)){
                extract($viewParm);
            }
            include "Views/".$file.".php";
        } elseif(file_exists("Views/".$file.".html")) {
            if(is_array($viewParm)){
                extract($viewParm);
            }
            include "Views/".$file.".html";
        }
        else die('Your View Page <span style="color:red">'.$file.'</span> does not exists');
    }

    function p($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    function image($file){

         if(file_exists("assets/images/".$file)) {
             echo 'assets/images/'.$file;
            } else {
             echo 'assets/images/oops.png';
}
    }
