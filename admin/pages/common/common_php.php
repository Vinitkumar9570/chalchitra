<?php 

    ini_set('session.gc_maxlifetime', 3600000);
 	session_start();
	require_once('dotEnv.php');
	$dotEnv = new DotEnv(__DIR__ . '/../../../.env'); 
	$dotEnv = $dotEnv->load();
	
?>