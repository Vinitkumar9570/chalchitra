<?php  
   
	$con=new mysqli(getenv('DATABASE_HOST'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'), getenv('DATABASE'));

	if (!$con) {
		die(mysqli_error($con));
	}


?>