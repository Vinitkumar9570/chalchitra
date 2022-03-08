    <?php 
      $banners = getBanners($db);
    ?>

<!-- Carousel Slide Image -->
    <section>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="page-container banner-container">
          <ol class="carousel-indicators">
            <?php for($i = 0; $i < sizeof($banners); $i++){ ?>
              <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active' ?>"></li>
            <?php } ?>
          </ol>
            
          <div class="carousel-inner">

            
              <?php for($i = 0; $i < sizeof($banners); $i++){ ?>
                <a href="<?php echo getenv('BASE_URL'); echo $banners[$i]['banner_link']; ?>">
                <div class="carousel-item <?php if($i == 0) echo 'active' ?>">
                  <img class="d-block w-100 image-resize" src="<?php echo $banners[$i]['banner_url']; ?>" alt="First slide">
                  <div class="desc-img item-1">
                  <h2 class="info-head"><?php echo $banners[$i]['title']; ?></h2>
                  <p><?php echo $banners[$i]['description']; ?></p>
                  <div class="slide-caption-info">
                    <div class="info-block">
                      <strong>Genre:</strong>
                      <a href="#" rel="category-tag" style="color: #ef81a3;">&nbsp;</a>
                      <a href="#" rel="category-tag" style="color: #ef81a3;">&nbsp;</a>
                      <a href="#" rel="category-tag" style="color: #ef81a3;"><?php echo $banners[$i]['genre']; ?></a>
                    </div>
                    <div class="info-block">
                      <strong>Duration:&nbsp;&nbsp;</strong>
                      <?php echo $banners[$i]['duration_minutes']; ?>min
                    </div>
                    <div class="info-block">
                      <strong>Release:&nbsp;&nbsp;</strong>
                      <?php echo $banners[$i]['release_year']; ?>
                    </div>
                    <div class="info-block">
                      <strong>IMDb:&nbsp;&nbsp;</strong>
                      <?php echo $banners[$i]['imdb_rating']; ?>
                    </div>
                  </div>
                  <div class="watch-btn">
                    <a href="#" class="btn btn-block btn-successful">
                    <i class="fa fa-play-circle play-block" aria-hidden="true"></i>
                    Open
                    </a>
                  </div>
                </div>
                </div>
              </a>
                <?php } ?>
                
              </div>
            

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>    
        </div>    
      </div>
    </section>