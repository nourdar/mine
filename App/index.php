<?php

include "loader.php";

include 'Views/header.php';

include 'Routes/Routes.php';


if(isset($view)){
    if(isset($viewParm)){
        view($view,$viewParm);
    } else {
        view($view);
    }

}




include 'Views/footer.php';

