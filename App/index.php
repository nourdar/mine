<?php

include "loader.php";

include 'Views/header.php';





if(isset($_GET['admin'])) {
    view('Admin/index.html');
}









include 'Views/footer.php';

