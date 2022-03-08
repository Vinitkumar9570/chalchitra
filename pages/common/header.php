  <?php 

    $category = getCategory($db);

  ?>

<!-- preloader -->
    <div class="preloader">
      <div class="loader">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- /preloader -->

    <!-- Header -->
    <header class="navigation">

      

        <nav class="navbar navbar-expand-lg navbar-light page-container">
          <a class="navbar-brand nav-size" href="./index.php"><img class="img-fluid logo-size" src="././images/logo/logo.png" alt="chalchitra"></a>
          <button class="navbar-toggler border-0 " type="button" data-toggle="collapse" data-target="#navogation"
            aria-controls="navogation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse text-center" id="navogation">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <a class="nav-link text-uppercase text-dark" href="<?php echo getenv('BASE_URL') ?>" >
                  Home
                </a>
              </li>

              <?php for($i = 0; $i< sizeof($category); $i++){ ?>
                <li class="nav-item">
                  <a class="nav-link text-uppercase text-dark" href="<?php echo getenv('BASE_URL') ?>?cid=<?php echo $category[$i]['id']; ?>"><?php echo $category[$i]['category']; ?></a>
                </li>
              <?php } ?>
            </ul>
            <form class="form-inline position-relative ml-lg-4">
              <input class="form-control px-0 w-100" type="search" placeholder="Search">
              <!-- <button class="search-icon" type="submit"><i class="ti-search text-dark"></i></button> -->
              <a href="search.html" class="search-icon"><i class="ti-search text-dark"></i></a>
            </form>
          </div>
        </nav>
      
    </header>