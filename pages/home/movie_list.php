<!-- header-box -->
    <?php 
      $movies = getMovies($db);

      echo "<pre>" ;print_r($movies);echo "</pre>" ;
    ?>
    <div class="outter-box page-container">
      <div class="header-box">
        <span class="pull-left">
          Yomovies-Copy
          <i class="fa fa-chevron-right right-sign" aria-hidden="true"></i>
        </span>
        <a href="#" class="right-text-style pull-right">view more
          <i class="fa fa-angle-double-right double-right" aria-hidden="true"></i>
        </a>
        <ul class="featured-box">
         <li href="#" class="featured-style">Featured</li>
        </ul>
      </div>

      <!-- Movie List-->
      <div class="container">
        <?php for($i = 0; $i< sizeof($movies); $i++){ 

          $lan = $movies[$i]['language'];
          $myArray = explode(',', $lan);
          ?>
            <div class="card">
          <span></span>
          <div class="imgbx">
            <a href="#" class="movie-language"><?php echo ucfirst($myArray[0]); ?></a>
            <img src="<?php echo $movies[$i]['image_url']; ?>">
            <a href="#" class="movie-info">
              <h2 class="movie-title"><?php echo $movies[$i]['title']; ?></h2>
            </a>
          </div>
          <div class="content">
            <div>
              <div class="movie movie-bootstrap">
                <div class="movie-content">
                  <div class="movie-name"><?php echo $movies[$i]['name']; ?></div>
                  <div class="movie-top">
                    <div class="movie-infoo movie-imdb"><?php echo $movies[$i]['imdb_rating']; ?></div>
                    <div class="movie-infoo">
                      <a href="#" style="color: #fff;"><?php echo $movies[$i]['release_year']; ?></a>
                    </div>
                    <div class="movie-infoo"><?php echo $movies[$i]['duration_minutes']; ?>min</div>
                  </div>
                  <p style="word-break: break-word;"><?php echo $movies[$i]['description']; ?></p>
                  <div class="block">Country: 
                    <a href="#"><?php echo $movies[$i]['origin']; ?></a>
                  </div>
                  <div class="block">
                    Genre:
                    <a href="#"><?php echo $movies[$i]['genre']; ?></a>
                  </div>
                  <div class="movie-bottom">
                    <a href="product_route.php?id=<?php echo $movies[$i]['id']; ?>" class="btn btn-block btn-successful">
                      <i class="fa fa-play-circle play-block" aria-hidden="true"></i>
                      Watch Movie
                    </a>
                    <a href="#" class="s1-button btn bp-btn-favorite">
                      <i class="fa fa-heart" aria-hidden="true" style="margin-right: 10px;"></i>
                      Favorite
                    </a>
                  </div>
                </div>  
              </div>    
            </div>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>

    