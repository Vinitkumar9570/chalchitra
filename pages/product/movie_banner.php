	<!-- Movie Banner -->
	<?php 

	$id=$_GET['id'];
	$sql="SELECT * FROM `movie_details` where id=$id";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_assoc($result);
	$name = $row['name'];
	$title = $row['title'];
	$description = $row['description'];
	$duration_minutes = (int)$row['duration_minutes'];
	$origin = $row['origin'];
	$imdb_rating = (float)$row['imdb_rating'];
	$release_year = $row['release_year'];
	$genre = $row['genre'];
	$link = $row['link'];
	$language = $row['language'];
	$director = $row['director'];
	$actors = $row['actors'];
	$image_url = $row['image_url'];
	$banner_url = $row['banner_url'];
	$is_active = (int)$row['is_active'];
	?>
	<div class="pp-page-container image-container">
		<img class="image-style" src="<?php echo $banner_url; ?>">
	</div>