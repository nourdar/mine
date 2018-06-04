<?php
    /**
     * @param $file
     */
function cssFile(string $file)
{
    global $cssPath;

    if (file_exists($cssPath.$file.".css")) {
        echo "<link href='".$cssPath.$file.".css' rel='stylesheet'/>";

    } else {
         echo "there is no css file " . $file.".css";
    }
}

    /**
     * @param $file
     */
function jsFile(string $file)
{
        global $jsPath;
    if (file_exists($jsPath.$file.".js")) {
        echo "<script src='".$jsPath.$file.".js' /></script>";
    } else {
        echo "there is no js file " . $file.".js";
    }
}



    /**
     * @param $array
     */
function p($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function pvd($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
    die();
}

/**
 * @param $file
 */
function image($file)
{
        global $imagesPath;
    if (file_exists($imagesPath. $file)) {
        $img = $imagesPath;
        $img .= $file;
        echo $img;
    } else {
          echo $imagesPath.'oops.png';
    }
}

function url(string $url)
{
    $mode = "test";

    if ($mode === "test") {
        echo "index.php?url=".$url;
    } else {
        echo $url;
    }
}

function purl(string $url)
{
   echo $url;
}

function me($column)
{
    $me = \Core\Factory::getModel("Me");
    return $me->giveMe($column);
}

function redirect($page)
{
    if($page == "back") {
       return header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        return header('Location: ' . $page);
    }
}

