

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Chalchitra</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./save_update_movie.php">Add movie</a>
        </li>

        <?php  if(isset($_SESSION['is_logged_in'])){ ?>
        <li class="nav-item" >
          <a class="nav-link" href="./categories_page.php">Category</a>
        </li>
        <?php } ?>

        <?php  if(isset($_SESSION['is_logged_in'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="./banners.php">Banners</a>
        </li>
        <?php } ?>


        <?php  if(!isset($_SESSION['is_logged_in'])){ ?>
        <li class="nav-item" >
          <a class="nav-link" href="./login.php">Login</a>
        </li>
        <?php } ?>


        <?php  if(!isset($_SESSION['is_logged_in'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="./register.php">Register</a>
        </li>
        <?php } ?>

        
        <?php  if(isset($_SESSION['is_logged_in'])){ ?>
        <li class="nav-item">
          <form action="login.php" method="post">
            <button type="submit" name="logout" class="nav-link logout">Logout</button>
          </form>
        </li>

        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo getenv('BASE_URL'); ?>" target="_blank">Chalchitra Home</a>
        </li>


      </ul>
    </div>
  </div>
</nav>