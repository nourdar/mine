<?php


/**
 * @param $file
 * @param null $viewParm
 */
function oldViewFunction ($file, $viewParm = null)
{
    global $viewsPath;
    if (file_exists($viewsPath.$file.".php")) {
        if (is_array($viewParm)) {
            extract($viewParm);
        }
        require $viewsPath.$file.".php";
    } elseif (file_exists($viewsPath.$file.".html")) {
        if (is_array($viewParm)) {
            extract($viewParm);
        }
        require $viewsPath.$file.".html";
    }

}


function view($view, $variables = null)
{
    $views = \Core\Factory::getView();
    if (!empty($variables)) {
        echo $views->make($view, $variables)->render();
    } else {
       echo $views->make($view)->render();
    }
    return true;
}

/* TO ADD DIRECTIVES */
//$blade->compiler()->directive('datetime', function ($expression) {
/*    return "<?php echo with({$expression})->format('F d, Y g:i a'); ?>";*/
//});
//
//{{-- In your Blade Template --}}
//<?php $dateObj = new DateTime('2017-01-01 23:59:59') ?>
