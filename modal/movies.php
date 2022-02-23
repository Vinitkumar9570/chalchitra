<?php 


function getMovies($con){
	$where = "";
	if (isset($_GET['cid'])) {
		$where = " where c.id = ".$_GET['cid'];
	}
	$results = mysqli_query($con, "SELECT m.id,m.image_url,m.name,m.title,m.description,m.duration_minutes,m.origin,m.imdb_rating,m.release_year,m.genre,m.link,m.language,m.director,m.actors,m.is_active,
	c.category
	FROM movie_details as m
	LEFT OUTER Join categories as c on (m.category_id = c.id)".$where);
	// $row = mysqli_fetch_array($results) ;
	$row = mysqli_fetch_all ($results, MYSQLI_ASSOC);
	return $row;
}

function getCategory($con){
	$results = mysqli_query($con, "SELECT * FROM categories");
	// $row = mysqli_fetch_array($results) ;
	$row = mysqli_fetch_all ($results, MYSQLI_ASSOC);
	return $row;
}

function getSugestedMovies($con, $genre, $id){

	$genres = explode(',', $genre);
	$where_query = "( ";
	for($i =0;$i< sizeof($genres);$i++){
		if($i != 0){
			$where_query.= " OR ";
		}
		$where_query.= "genre like '%".trim($genres[$i])."%'";

	}
	$where_query.= " )";
	$results = mysqli_query($con, "SELECT * FROM movie_details WHERE is_active=1 AND $where_query And id<>$id ORDER BY created_at DESC limit 8");
	// $row = mysqli_fetch_array($results) ;
	$row = mysqli_fetch_all ($results, MYSQLI_ASSOC);
	return $row;


	
}



