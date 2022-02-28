	<?php 

		$id=$_GET['id'];
	    $sql="SELECT * FROM `movie_details` where id=$id";
	    $result=mysqli_query($db,$sql);
	    $row=mysqli_fetch_assoc($result);
	    $name = $row['name'];
	    
	?>

<!-- Movie Info -->

	<div class="pp-page-container info">
		<a href="./index.php">Home</a>
		/&nbsp
		<a href="./index.php">Movies</a>
		/&nbsp
		<a><?php echo $name; ?></a>		
	</div>