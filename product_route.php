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

    <?php include "pages/common/head.php"; 
    $id = $_GET['id'];
    ?>

  </head>

  <body>

    <?php include "pages/common/header.php"; ?>

    <?php include "pages/product/alertdiv.php"; ?>
  
    <?php include "pages/product/movie_info.php"; ?>

    <?php include "pages/product/movie_banner.php"; ?>

    <?php include "pages/product/movie_details.php"; ?>

    <?php include "pages/product/movie_keywords.php"; ?>

    <?php include "pages/product/download_cont.php"; ?>

    <?php include "pages/product/movie_list.php"; ?>

    <?php include "pages/common/footer.php"; ?>

    <?php include "pages/common/social_media.php"; ?>

    <?php include "pages/common/bottom_link.php"; ?>


    <!-- Main Script -->
    <script src="js/script.js"></script>

  </body>
</html>