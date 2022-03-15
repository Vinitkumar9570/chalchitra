<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>crud operation</title>

	 <!--Favicon-->
	 <link rel="shortcut icon" href="././static/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="././static/images/favicon.ico" type="image/x-icon">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="static/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="static/bootstrap/bootstrap.bundle.min.js">
	<link rel="stylesheet" type="text/css" href="static/DataTables/datatables.min.css"/>

	<!-- Java Script -->
	<script type="text/javascript" src="static/script/jquery/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="static/DataTables/datatables.min.js"></script>

	<link rel="stylesheet" href="static/css/style.css">
</head>
<?php 
	include 'common_php.php'; 
		
	include 'connect.php';
	if(!isset($page_name)){

		if(isset($_SESSION)){
			if(!isset($_SESSION['user_id'])){
				header('location:login.php');
			}
		}else{
			header('location:login.php');
		}
	}
?>
<?php require 'partials/nav.php' ?>
<body>
	
