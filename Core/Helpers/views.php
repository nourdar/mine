<?php


/**
 * @param $file
 * @param null $viewParm
 */
function view ($file,$viewParm = null) {
    global $viewsPath;
    if(file_exists($viewsPath.$file.".php")) {
        if(is_array($viewParm)){
            extract($viewParm);
        }
        require $viewsPath.$file.".php";
    } elseif(file_exists($viewsPath.$file.".html")) {
        if(is_array($viewParm)){
            extract($viewParm);
        }
        require $viewsPath.$file.".html";
    }

}