<?php

if(!isset($em)){ $em = "unknown error"; }
if(!isset($sm)){ $sm = "successful operation"; }

$errorMessage ='<div class="ui error message"><div class="header">There is something wrong</div><p>'.$em.'</p> </div>';
$successMessage ='<div class="ui success message"><div class="header">everything is okey</div><p>'.$sm.'</p> </div>';
