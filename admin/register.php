<?php 
$page_name = 'register'; 
include 'pages/common/head.php'; ?>

<?php 

    
    $name = "";
    $email = "";
    $password = "";
    $role = "";

  
	if (isset($_GET['updateid'])) {
		
		$id=$_GET['updateid'];
		$sql="SELECT * FROM `users_login` where id=$id";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$name = $row['name'];
		$email = $row['email'];
		$password = $row['password'];
		$role = $row['role'];

	}



  	if (isset($_POST['update'])) {
		
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];
	

		$sql="UPDATE `users` set id=$id, name='$name', email='$email', password='$password', role='$role', where id=$id";

		$result=mysqli_query($con,$sql);
		if($result){
		// echo "Updated successfully";
		header('location:index.php');
		}else{
		die(mysqli_error($con));
		}
	}  


  	if (isset($_POST['submit'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		$sql = "SELECT * FROM `users` WHERE email = '$email' ";
		$result = mysqli_query($con, $sql);
		// print_r ($result->num_rows) ;
		if ($result->num_rows == 0){ 
			$sql="insert into `users` (name,email,password,role,is_active) values('$name','$email','$password','$role',1)";
	

			if ($con->query($sql) === TRUE) {
			$last_id = $con->insert_id;
			
	
			header('location:index.php');
			
			} else {
			echo "Error: " . $sql . "<br>" . $con->error;
			}
		}else{
			echo "Error: Dulicate Email";
			$showError = "Dulicate Email";
		}
        


	

	}

	


?>


    <div class="container my-5 ">

	<h1 class="text-center">Register to our website</h1><br>
      
        <form method="post" enctype="multipart/form-data">

            <div class="form-group col-md-6">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value="<?php echo $name; ?>">
            </div>

            <div class="form-group col-md-6">
            <label>Email Id</label>
            <input type="email" class="form-control" placeholder="Enter your email id" name="email" autocomplete="off" value="<?php echo $email; ?>">
            </div>

            <div class="form-group col-md-6">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" value="<?php echo $password; ?>">
            </div>

            <div class="form-group col-md-6">
            <label>Role</label>
              <select name="role">
                <option value=""> --Select-- </option>
                <option value="Admin"> ADMIN</option>
                <option value="Costumer"> COSTUMER </option>
              </select>
            </div><br>

            <button type="submit" class="btn btn-primary button" name="<?php if(!isset($_GET['updateid'])) echo 'submit'; else echo 'update'; ?>">Submit</button>
        </form>

    </div>
<?php include 'pages/common/foot.php'; ?>