<?php include 'pages/common/head.php'; ?>

		<div class="container">
			<a href="save_update_movie.php" class="text-light"><button class="btn btn-primary my-5">Add Movie</button></a>
			<div class="outer-table">
				<table id="datatable" class="table">
				  	<thead>
					    <tr>
					      	<th scope="col">SI no</th>
					      	<th scope="col">ID</th>
					      	<th scope="col">Image</th>
					      	<th scope="col">Name</th>
					      	<th scope="col">Title</th>
					      	<th scope="col">Category</th>
							<th scope="col">Description</th>
							<th scope="col">Duration </th>
							<th scope="col">Origin</th>
							<th scope="col">IMDb Rating</th>
							<th scope="col">Realease</th>
							<th scope="col">Genre</th>
							<th scope="col">Link</th>
							<th scope="col">Language</th>
							<th scope="col">Director</th>
							<th scope="col">Actor's</th>
							<th scope="col">Is Active</th>
							<th scope="col">Operation</th>
					    </tr>
					</thead>
					<tbody>

						<?php  

							// $sql="SELECT * FROM `movie_details` ORDER BY created_at DESC";
							$sql="SELECT m.id,m.image_url,m.name,m.title,m.description,m.duration_minutes,m.origin,m.imdb_rating,m.release_year,m.genre,m.link,m.language,m.director,m.actors,m.is_active,
							c.category
							FROM movie_details as m
							LEFT OUTER Join categories as c on (m.category_id = c.id)";
							$result=mysqli_query($con,$sql);
							$rows=mysqli_fetch_all ($result, MYSQLI_ASSOC);
    
							
							$i = 1;
							if($result){
								foreach ($rows as $row) {
									$id=$row['id'];
									$image_url = $row['image_url'];
									$name=$row['name'];
									$title = $row['title'];
									$category = $row['category'];
									$description = $row['description'];
									$duration_minutes = $row['duration_minutes'];
									$origin = $row['origin'];
									$imdb_rating = $row['imdb_rating'];
									$release_year = $row['release_year'];
									$genre = $row['genre'];
									$link = $row['link'];
									$language = $row['language'];
									$director = $row['director'];
									$actors = $row['actors'];
									$is_active = $row['is_active'];

									
									echo '	<tr>
											    <th scope="row">'.$i.'</th>
											    <th scope="row">'.$id.'</th>
											    <td>
											    	<img src="../'.$image_url.'" alt="'.$image_url.'" height="150px">
												</td>
											    <td>'.$name.'</td>
											    <td>'.$title.'</td>
											    <td>'.$category.'</td>
											    <td>'.$description.'</td>
											    <td>'.$duration_minutes.'</td>
											    <td>'.$origin.'</td>
											    <td>'.$imdb_rating.'</td>
											    <td>'.$release_year.'</td>
											    <td>'.$genre.'</td>
											    <td>'.$link.'</td>
											    <td>'.$language.'</td>
											    <td>'.$director.'</td>
											    <td>'.$actors.'</td>
												<td>'.$is_active.'</td>
											    <td>
													<a href="save_update_movie.php?updateid='.$id.'" class="text-light"><button class="btn btn-primary" style="margin-bottom:10px;">Edit</button></a>
													<a href="modal/delete.php?deleteid='.$id.'" delteteid='.$id.'
													class="text-light"><button class="btn btn-danger">Delete</button></a>
											    </td>
										    </tr>';
										    $i++;
								}
							}

						?>

						
					</tbody>
				</table>
			</div>
			
		</div>
		<script type="text/javascript">
			$('#datatable').DataTable({});
		</script>
<?php include 'pages/common/foot.php'; ?>