<?php 
	require_once('dotEnv.php');
	$dotEnv = new DotEnv(__DIR__ . '/../../../.env'); 
	$dotEnv = $dotEnv->load();
	
?>