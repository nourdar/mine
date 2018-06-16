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
        return $img;
    } else {
        return $imagesPath.'oops.png';
    }
}

function icon($icon, $subFolder = null)
{
    global $iconsPath, $imagesPath;
    if (file_exists($iconsPath. $icon)) {
        $img = $iconsPath;
        $img .= $icon;
        return $img;
    } elseif (file_exists($iconsPath.$subFolder."/". $icon)) {

        $img = $iconsPath.$subFolder."/";
        $img .= $icon;
        return $img;

    } else {
        return $imagesPath.'oopsssssss.png';
    }
}
function url(string $url)
{
    $mode = "test";

    if ($mode === "test") {
        return "index.php?url=".$url;
    } else {
        return $url;
    }
}


function me($column)
{
    $me = \Core\Factory::getModel("Me");
    return $me->giveMe($column);
}

function givMe($column, $model)
{
    $model = \Core\Factory::getModel($model);
    return $model->giveMe($column);
}
function redirect($page)
{
    if($page == "back") {
       return header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        return header('Location: ' . $page);
    }
}

function facebookButton()
{
    if (empty(me('is_f_show'))) {
       return null;
    } else {
        echo  ' <li><a target="_blank" href="'.me('facebook').'">
                        <div class="facebook icon"><span class="zocial-facebook"></span></div>
                        <h2 class="facebook titular">My Facebook Profile</h2></li></a>';

    }
}

function twitterButton()
{
    if (empty(me('is_t_show'))) {
        return null;
    } else {
        echo  ' <li><a href="'.me('twitter').'">
                 <div class="twitter icon"><span class="zocial-twitter"></span>
                 </div><h2 class="twitter titular">My Twitter Profile</h2></li></a>';

    }
}

function githubButton()
{
    if (empty(me('is_g_show'))) {
        return null;
    } else {
        echo  '  <li><a href="'.me('github').'">
              <div class="github icon"><span class="fab fa-github"></span></div>
              <h2 class="github titular">My Github</h2></li></a>';

    }
}


function getCountry($ip)
{
    $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
    $array = [
        'NAME'      => $xml->geoplugin_countryName,
        'CODE'      => strtolower($xml->geoplugin_countryCode)
    ];
    return $array ;
}

function controller($yourNewFolder)
{
   return  \Core\Factory::controllerNameSpace($yourNewFolder);
}