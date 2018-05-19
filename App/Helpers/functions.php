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

    function view ($file) {
        if(file_exists("Views/".$file)) {
            include "Views/".$file;
        }
        else die('file'.$file.'does not exists');
    }