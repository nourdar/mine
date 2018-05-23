
<?php

view('header');
view('Admin/navbar',['me'=>$me]);

	if(isset($adminPage)){
		include $adminPage;
	} else {
		echo "<h1>Welcome To Admin Panel No Page To Open</h1>";
	}




view('Admin/footer');

