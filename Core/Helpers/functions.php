<?php
    /**
     * @param $file
     */
    function css ($file) {
        global $cssPath;

        if(file_exists($cssPath.$file.".css")) {
            echo "<link href='".$cssPath.$file.".css' rel='stylesheet'/>";

        } else {
             echo "there is no css file " . $file.".css";
        }
    }

    /**
     * @param $file
     */
    function js ($file) {
        global $jsPath;
        if(file_exists($jsPath.$file.".js")) {
            echo "<script src='".$jsPath.$file.".js' /></script>";
        } else {
            echo "there is no js file " . $file.".js";
        }
    }



    /**
     * @param $array
     */
    function p($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    function pvd($array){
        var_dump(p($array));
        die();
    }

    /**
     * @param $file
     */
    function image($file){
        global $imagesPath;
         if(file_exists($imagesPath.$file)) {
             echo $imagesPath.$file;
            } else {
             echo $imagesPath.'oops.png';
}
    }

