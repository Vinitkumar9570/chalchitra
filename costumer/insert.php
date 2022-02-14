<?php 

	include 'connect.php';

	extract($_POST);

	if(isset($_POST['nameSend']) && isset($_POST['emailSend']) && isset($_POST['mobileSend']) && isset($_POST['passwordSend'])){

		$sql="insert into `costumer_service` (name,email,mobile,password) values('$nameSend','$emailSend','$mobileSend','$passwordSend')";

		$result=mysqli_query($con,$sql);
	}

?>