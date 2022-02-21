
<?php
$page_name = 'login'; 
include 'pages/common/head.php'; ?>
<?php 

     $showAlert = false;
     $showError = false;
     if (isset($_POST['login'])) {
       
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $exists=false;
        if(($password == $cpassword) && $exists==false){
            $sql = "SELECT id, name, role FROM `users` WHERE email = '$email' AND password = '$password' ;";
            $result = mysqli_query($con, $sql);
            if ($result->num_rows == 1){ 
              $row=mysqli_fetch_assoc($result);
              $_SESSION['is_logged_in'] = true;
              $_SESSION['user_id'] =$row['id'];
              $_SESSION['name'] =$row['name'];
              $_SESSION['role'] =$row['role'];

              header('location:index.php');

            }else{
              $showError = "Email or password missmatch";
            }
            
        }
        else{
            $showError = "Passwords do not match";
        }

    }

    if (isset($_POST['logout'])) {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['role']);

        header('location:login.php');
  }

?>

		<div class="container">
			
				

					<?php

					if($showError){       

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> '.$showError.'
						</div>';
					}

					?>


		<div class="container my-4">

			<h1 class="text-center">LogIn to our website</h1>

			<form action="login.php" method="post">
				<div class="form-group col-md-6">
					<label for="email" class="form-label">Email</label>
					<input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
					
				</div>

				<div class="form-group col-md-6">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>

				<div class="form-group col-md-6">
					<label for="cpassword" class="form-label">Confirm Password</label>
					<input type="password" class="form-control" id="cpassword" name="cpassword">
					<div id="emailHelp" class="form-text">Make sure to type the same password.</div>
				</div>

				<button type="submit" class="btn btn-primary button" name="login">Log In</button>
			</form>
			</div>
			
		</div>
<?php include 'pages/common/foot.php'; ?>