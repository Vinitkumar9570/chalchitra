
<?php 
require_once('dotEnv.php');
$dotEnv = new DotEnv(__DIR__ . '/.env'); 
$dotEnv = $dotEnv->load(); 
include('modal/connect.php');
include('modal/movies.php');
$db = connectDb(); 
?>
<!DOCTYPE html>
<html>

  <head>

    <?php include "pages/common/head.php"; ?>

  </head>

  <body>
    
    <?php include "pages/common/header.php"; ?>
    
    <?php include "pages/home/carousel.php"; ?>

    <?php include "pages/home/alertdiv.php"; ?>

    <?php include "pages/home/movie_list.php"; ?>

    <?php include "pages/home/pagination.php"; ?>

    <?php include "pages/common/footer.php"; ?>

    <?php include "pages/common/social_media.php"; ?>

    <?php include "pages/common/bottom_link.php"; ?>


    <!-- Main Script -->
    <script src="js/script.js"></script>

  </body>
</html>