<?php 


function getMovies($con){
	$results = mysqli_query($con, "SELECT * FROM movie_details WHERE is_active=1 ORDER BY created_at DESC");
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



