<?php include 'pages/common/head.php'; ?>

<?php 


  $name = "";
  $title = "";
  $description = "";
  $duration_minutes = "";
  $origin = "";
  $imdb_rating = "";
  $release_year = "";
  $genre = "";
  $link = "";
  $language ="";
  $category_id ="";
  $director ="";
  $actors ="";
  $image_url = "";
  $banner_url = "";
  $is_active = "";

  
  if (isset($_GET['updateid'])) {
    $id=$_GET['updateid'];
    $sql="SELECT * FROM `movie_details` where id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $name = $row['name'];
    $title = $row['title'];
    $description = $row['description'];
    $duration_minutes = (int)$row['duration_minutes'];
    $origin = $row['origin'];
    $imdb_rating = (float)$row['imdb_rating'];
    $release_year = $row['release_year'];
    $genre = $row['genre'];
    $link = $row['link'];
    $language = $row['language'];
    $category_id = $row['category_id'];
    $director = $row['director'];
    $actors = $row['actors'];
    $image_url = $row['image_url'];
    $banner_url = $row['banner_url'];
    $is_active = (int)$row['is_active'];

  }



  if (isset($_POST['update'])) {
    // if($banner_url){
    //   $target_dir = "../uploads/";
    // }else{
    //   $target_dir = getenv('FILE_URL');
    // }
    $target_dir = "../uploads/";
    if($_FILES["imageUpload"]["name"]){
      $target_file = $target_dir . basename(date("Ymdhs",time()).$_FILES["imageUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if($image_url){
        $target_file = '../'.$image_url;
      }
      if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
          exit();
      }
    }
    // banner upload
    $banner_target_dir = "../uploads/banners/";
    if($_FILES["bannerUpload"]["name"]){
      $banner_target_file = $target_dir.'banners/' . basename(date("Ymdhs",time()).$_FILES["bannerUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($banner_target_file,PATHINFO_EXTENSION);

      if($banner_url){
        $banner_target_file = '../'.$banner_url;
      }
      if (move_uploaded_file($_FILES["bannerUpload"]["tmp_name"], $banner_target_file)) {
          echo "The file ". basename( $_FILES["bannerUpload"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
          exit();
      }
    }

    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration_minutes = (int)$_POST['duration_minutes'];
    $origin = $_POST['origin'];
    $imdb_rating = (float)$_POST['imdb_rating'];
    $release_year = $_POST['release_year'];
    $genre = $_POST['genre'];
    $link = $_POST['link'];
    $language = $_POST['language'];
    $category_id = $_POST['category_id'];
    $director = $_POST['director'];
    $actors = $_POST['actors'];
    if($_FILES["imageUpload"]["name"]){
      $image_url = substr($target_file, 3);
    }else{
      $image_url = $image_url;
    }

    if($_FILES["bannerUpload"]["name"]){
      $banner_url = substr($banner_target_file, 3);
    }else{
      $banner_url = $banner_url;
    }
    
    $is_active = (int)$_POST['is_active'];
  

    $sql="UPDATE `movie_details` set id=$id, name='$name', title='$title', description='$description',
     duration_minutes='$duration_minutes', origin='$origin', imdb_rating='$imdb_rating',
      release_year='$release_year', genre='$genre', link='$link', language='$language', category_id='$category_id', 
      director='$director', actors='$actors', image_url='$image_url',banner_url='$banner_url', is_active='$is_active' where id=$id";

    $result=mysqli_query($con,$sql);
    if($result){
      // echo "Updated successfully";
      header('location:index.php');
    }else{
      die(mysqli_error($con));
    }
  }  


  if (isset($_POST['submit'])) {

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename(date("Ymdhs",time()).$_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }
    // banner upload
    $banner_target_dir = "../uploads/banners/";
    print_r($_FILES);
    $banner_target_dir = $banner_target_dir . basename(date("Ymdhs",time()).$_FILES["bannerUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($banner_target_dir,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["bannerUpload"]["tmp_name"], $banner_target_dir)) {
        echo "The file ". basename( $_FILES["bannerUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }


    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration_minutes = (int)$_POST['duration_minutes'];
    $origin = $_POST['origin'];
    $imdb_rating = (float)$_POST['imdb_rating'];
    $release_year = $_POST['release_year'];
    $genre = $_POST['genre'];
    $link = $_POST['link'];
    $language = $_POST['language'];
    $category_id = $_POST['category_id'];
    $director = $_POST['director'];
    $actors = $_POST['actors'];
    $image_url = substr($target_file, 3);
    $banner_url = substr($banner_target_dir, 3);
    $is_active = (int)$_POST['is_active'];
  

    $sql="insert into `movie_details` (name,title,description,duration_minutes,origin,imdb_rating,release_year,genre,link,language,category_id,director,actors,image_url,banner_url,is_active) values('$name','$title','$description',$duration_minutes,'$origin',$imdb_rating,$release_year,'$genre','$link','$language','$category_id','$director','$actors','$image_url','$banner_url',$is_active)";
 

    if ($con->query($sql) === TRUE) {
      $last_id = $con->insert_id;
      

      header('location:index.php');
     
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


  } 
  
    $sql="SELECT * FROM `categories` ORDER BY id DESC";
    $result=mysqli_query($con,$sql);
    $crows=mysqli_fetch_all ($result, MYSQLI_ASSOC);

?>


    <div class="container my-5">
      <a href="index.php" class="text-light"><button class="btn btn-primary my-3">Back Home</button></a>
      <form method="post" enctype="multipart/form-data" class="form-style">
        <div class="form-group col-md-8">
          <label>Name</label>
          <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value="<?php echo $name; ?>">
        </div>


        <div class="form-group col-md-8">
          <label>Title</label>
          <input type="text" class="form-control" placeholder="Enter your title" name="title" autocomplete="off" value="<?php echo $title; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Description</label>
          <input type="text" class="form-control" placeholder="Enter your description" name="description" autocomplete="off" value="<?php echo $description; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Duration In Minutes</label>
          <input type="text" class="form-control" placeholder="Enter your duration" name="duration_minutes" autocomplete="off" value="<?php echo $duration_minutes; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Origin</label>
          <input type="text" class="form-control" placeholder="Enter your origin" name="origin" autocomplete="off" value="<?php echo $origin; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>IMDB Ratting</label>
          <input type="text" class="form-control" placeholder="Enter your imdb_rating" name="imdb_rating" autocomplete="off" value="<?php echo $imdb_rating; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Release Year</label>
          <input type="text" class="form-control" placeholder="Enter your release_year" name="release_year" autocomplete="off" value="<?php echo $release_year; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Genre</label>
          <input type="text" class="form-control" placeholder="Enter your genre" name="genre" autocomplete="off" value="<?php echo $genre; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Link</label>
          <input type="text" class="form-control" placeholder="Enter your link" name="link" autocomplete="off" value="<?php echo $link; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Language</label>
          <input type="text" class="form-control" placeholder="Enter your Movie Language" name="language" autocomplete="off" value="<?php echo $language; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Director</label>
          <input type="text" class="form-control" placeholder="Enter your Movie Director" name="director" autocomplete="off" value="<?php echo $director; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Actor's</label>
          <input type="text" class="form-control" placeholder="Enter your Movie Actor's" name="actors" autocomplete="off" value="<?php echo $actors; ?>">
        </div>

        <div class="form-group col-md-8">
          <label>Image</label>
          <input type="file" name="imageUpload" id="imageUpload">
          
          <?php if ($image_url != "") { ?>
             <img src="../<?php echo $image_url ?>" alt="'.$image_url.'" height="150px">;
          <?php } ?>

        </div>

        <div class="form-group col-md-8">
          <label>Banner</label>
          <input type="file" name="bannerUpload" id="bannerUpload">
          <?php if ($image_url != "") { ?>
            <img src="../<?php echo $banner_url ?>" alt="'.$banner_url.'" height="auto" width="250px">
          <?php } ?>
          
        </div>
        
        
        <div class="form-group col-md-8">
            <label>Category</label>
              <select name="category_id">
                <option value=""> --Select-- </option>

                <?php foreach ($crows as $row) {
                                $id=$row['id'];
                                $category = $row['category']; ?>
                <option value="<?php echo $id ?>" <?php if($id == $category_id) echo 'selected'; ?>> <?php echo $category ?> </option>
                <?php } ?> 

              
              </select>
            </div><br>

        <div class="form-group col-md-8">
          <label>Is Active</label>
          <input type='radio' id='radio_1' class="form-control" name="is_active"  autocomplete="off" value="<?php echo $is_active; ?>" <?php if($is_active == 1) echo 'checked' ?>> 
          <script type="text/javascript">
            $('input[type=radio]').click(function(){


                if (this.previous) {
                    this.checked = false;
                }
                this.previous = this.checked;

                if ($(this).prop('checked')==true){ 
                    $('input[type=radio]').val('1');
                }else{
                  $('input[type=radio]').val('0');
                }

            });
          </script>
        </div>

        <button type="submit" class="btn btn-primary col-md-8" name="<?php if(!isset($_GET['updateid'])) echo 'submit'; else echo 'update'; ?>">Submit</button>
      </form>

    </div>
<?php include 'pages/common/foot.php'; ?>