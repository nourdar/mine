<?php

function model($name)
{
    return \Core\Factory::getModel($name);
}

function paginate($route, int $all, int $currentPage, int $end)
{
    $pages = ceil($all/$end);
    $route = $route."/";

    echo '<div class="ui pagination  menu">';
    for ($i = 1; $i <= $pages; $i++) {
        if ($pages === 0) {
            return false;
        }

        if ($i === $currentPage) {
          $active = "active";
        } else {
            $active = " ";
        }

        echo '<a href="'.$route.$i.'" class=" '.$active.' red item">'.$i.'</a>';

        if ($i === $pages) {
            break;
        }
    }
    echo '</div>';
}


