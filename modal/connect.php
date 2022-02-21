<?php 

	function connectDb(){
		session_start();
		
		$con = new mysqli(getenv('DATABASE_HOST'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'), getenv('DATABASE'));
		
		if ($con -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $con -> connect_error;
		  exit();
		}
		return $con;
	}
	
