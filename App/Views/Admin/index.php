<?php

include "navbar.php";

	if(isset($Adminpage)){
		include $Adminpage;
	} else {
		echo "<h1>Welcome To Admin Panel No Page To Open</h1>";
	}

include "footer.php";

