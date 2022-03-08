<?php 


function getMovies($con){
	// limit
	$cur_page = 1;
	if (isset($_GET['page'])) {
		$cur_page = $_GET['page'];
	}
	$per_page_result = getenv('PER_PAGE_RECORD');
	$results = mysqli_query($con, "SELECT count(*) as total
	FROM movie_details ");
	$row = mysqli_fetch_all ($results, MYSQLI_ASSOC);
	$total_records = $row[0]['total'];
	$total_pages = ceil($total_records / $per_page_result);
	$end_limit = $cur_page* $per_page_result;
	$start_limit = $end_limit - $per_page_result;

	
	$where = "";
	if (isset($_GET['cid'])) {
		$where = " where c.id = ".$_GET['cid'];
	}
	$results = mysqli_query($con, "SELECT m.id,m.image_url,m.banner_url,m.name,m.title,m.description,
	m.duration_minutes,m.origin,m.imdb_rating,m.release_year,m.genre,m.link,m.language,m.director,
	m.actors,m.is_active,c.category
	FROM movie_details as m
	LEFT OUTER Join categories as c on (m.category_id = c.id)".$where. " LIMIT ".$start_limit." , ".$per_page_result);
	
	$row = mysqli_fetch_all ($results, MYSQLI_ASSOC);
	return $row;
}


function getPages($con){
	$pages = array();
	$per_page_result = getenv('PER_PAGE_RECORD');
	$cur_page = 1;
	if (isset($_GET['page'])) {
		$cur_page = $_GET['page'];
	}
	$results = mysqli_query($con, "SELECT count(*) as total
	FROM movie_details ");
	
	$row = mysqli_fetch_all ($results, MYSQLI_ASSOC);


	$total_pages = ceil($row[0]['total'] / $per_page_result);
	$pages['total_records'] = $row[0]['total'];
	$pages['current_page'] = $cur_page;
	$pages['total_pages'] = $total_pages;

	$pages['prev'] = "";
	if($cur_page > 1 && $total_pages >= $cur_page){
		$pages['prev'] = $cur_page -1;
	}
	$pages['next'] = "";
	if($cur_page >= 1 && $total_pages > $cur_page){
		$pages['next'] = $cur_page +1;
	}

	return $pages;
}


function getCategory($con){
	$results = mysqli_query($con, "SELECT * FROM categories");
	// $row = mysqli_fetch_array($results) ;
	$row = mysqli_fetch_all ($results, MYSQLI_ASSOC);
	return $row;
}

function getBanners($con){
	$results = mysqli_query($con, "SELECT m.id,m.image_url,m.banner_url,m.name,m.title,m.description,
	m.duration_minutes,m.origin,m.imdb_rating,m.release_year,m.genre,m.link,m.language,m.director,
	m.actors,m.is_active,b.movies_id,b.link as banner_link,b.page_type,b.is_active 
	FROM banners as b 
	LEFT OUTER Join movie_details as m on (b.movies_id = m.id) WHERE b.is_active=1 AND b.page_type='home'");
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
	$results = mysqli_query($con, "SELECT * FROM movie_details WHERE is_active=1 AND $where_query And id<>$id 
	ORDER BY created_at DESC limit 8");
	// $row = mysqli_fetch_array($results) ;
	$row = mysqli_fetch_all ($results, MYSQLI_ASSOC);
	return $row;


	
}



