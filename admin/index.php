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
					      	<th scope="col">Banner</th>
							<th scope="col">Video</th>
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
							<th scope="col">Is Series</th>
							<th scope="col">Is Active</th>
							<th scope="col">Operation</th>
					    </tr>
					</thead>
					<tbody>

						<?php  

							
							$sql="SELECT m.id,m.image_url,m.banner_url,m.video_id,m.name,m.title,m.description,m.duration_minutes,m.origin,m.imdb_rating,m.release_year,m.genre,m.link,m.language,m.director,m.actors,m.is_series,m.is_active,
							c.category, v.link as video_link
							FROM movie_details as m
							LEFT OUTER Join categories as c on (m.category_id = c.id)
							LEFT OUTER Join videos as v on (m.video_id = v.id) ORDER BY m.created_at DESC";
							$result=mysqli_query($con,$sql);
							$rows=mysqli_fetch_all ($result, MYSQLI_ASSOC);
    
							
							$i = 1;
							if($result){
								foreach ($rows as $row) {
									$id=$row['id'];
									$image_url = $row['image_url'];
									$banner_url = $row['banner_url'];
									$video_id=$row['video_id'];
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
									$is_series = $row['is_series'];
									$is_active = $row['is_active'];
									$video_link = $row['video_link'];

									if ( $row['video_link'] == '' ) { 
										$hide = "display:none";
									}else{
										$hide = "";
									}

									
									echo '	<tr>
											    <th scope="row">'.$i.'</th>
											    <th scope="row">'.$id.'</th>
											    <td>
											    	<img src="../'.$image_url.'" alt="'.$image_url.'" height="150px">
												</td>
												<td>
											    	<img src="../'.$banner_url.'" alt="'.$banner_url.'" height="auto" width="250px">
												</td>
											    <td>
													<video style="'.$hide.'" width="250px" height="auto" controls><source src="../'.$video_link.'""></video>


													<a href="upload_movie.php?updateid='.$id.'" class="text-light"><button class="btn btn-primary"
													 style="margin-bottom:10px;">Upload</button></a>
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
												<td>'.$is_series.'</td>
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