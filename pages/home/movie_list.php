<!-- header-box -->
    <?php 
      $movies = getMovies($db);
    ?>
    <div class="outter-box page-container">
      <div class="header-box">
        <span class="pull-left">
          Chalchitra
          <i class="fa fa-chevron-right right-sign" aria-hidden="true"></i>
        
      </div>

      <!-- Movie List-->
      <div class="container">
        <?php for($i = 0; $i< sizeof($movies); $i++){ 

          $lan = $movies[$i]['language'];
          $myArray = explode(',', $lan);
          ?>
            <div class="card movie-<?php echo $movies[$i]['id']; ?>" id="movie-<?php echo $movies[$i]['id']; ?>">
            
          <span></span>
          <div class="imgbx">
            <a href="#" class="movie-language"><?php echo ucfirst($myArray[0]); ?></a>
            <img src="<?php echo $movies[$i]['image_url']; ?>">
            <a href="#" class="movie-info">
              <h2 class="movie-title"><?php echo $movies[$i]['title']; ?></h2>
            </a>
          </div>
          <div class="content show-<?php echo $movies[$i]['id']; ?>" id="show-<?php echo $movies[$i]['id']; ?>">
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

    <script>
      $('.card').click(function() {
        if ($(window).width() < 1080){

          var myArray = this.id.split("-");

          // remove other visible detail

          $(".container .card span").css("width", "unset");
          $(".container .card span").css("height", "unset");
          $(".container .card .content div").css("visibility", "hidden");

          // show visible detail
          $("#show-"+myArray[1]+" div").css("visibility", "visible");
          $("#movie-"+myArray[1]+" span").css("width", "1000px");
          $("#movie-"+myArray[1]+" span").css("height", "1000px");
        }
      });

    </script>