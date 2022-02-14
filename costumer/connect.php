<?php 

	$con=new mysqli('localhost','vinit','vinit','test');

	if(!$con){
		die(mysqli_error($con));
	}

?>