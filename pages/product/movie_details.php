<!-- MOvie Details -->
	
	<div class="movie-contentes pp-page-container">
		<div class="movie-whte-space"></div>
		<div class="movie-image-container">
			<img class="pp-image-resize" src="<?php echo $image_url; ?>">
		</div>
		<div class="movie-details">
			<h3 style="font-weight: 700;"><?php echo $name; ?></h3>
			<div class="description">
				<p><?php echo $description; ?></p>
			</div>
			<div class="movie-infooo">
				<div class="left-side">
					<p>
						<strong>Genre:&nbsp</strong>
						<a href="#"><?php echo $genre; ?></a>
					</p>
					<p>
						<strong>Director:&nbsp</strong>
						<a href="#"><?php echo $director; ?></a>
					</p>
					<p>
						<strong>Actors:&nbsp</strong>
						<a href="#"><?php echo $actors; ?></a>
					</p>
					<p>
						<strong>Country:&nbsp</strong>
						<a href="#"><?php echo $origin; ?></a>
					</p>
				</div>
				<div class="right-side">
					<p>
						<strong>Duration:&nbsp</strong>
						<span style="color: #e13e71;"><?php echo $duration_minutes; ?> min</span>
					</p>
					<p>
						<strong>Language:&nbsp</strong>
						<span class="language"><?php echo $language; ?></span>
					</p>
					<p>
						<strong>Release:&nbsp</strong>
						<span style="color: #e13e71;"><?php echo $release_year; ?></span>
					</p>
					<p>
						<strong>IMDb:&nbsp</strong>
						<span class="imdb-rating"><?php echo $imdb_rating; ?></span>
					</p>	
				</div>
			</div>
		</div>
	</div>