<?php 

    $page_name = 'banners'; 
    include 'pages/common/head.php'; 
    
?>

<?php 

    $bmovies_id = "";
    $blink = "product_route.php?id=";
    $bimage_url = "";
    $bpage_type = "";
    $bis_active = "";

   if (isset($_GET['updateid'])) {
       
    $id=$_GET['updateid'];
    $sql="SELECT * FROM `banners` where id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $bmovies_id = $row['movies_id'];
    $blink = $row['link'];
    $bpage_type = $row['page_type'];
    $bis_active = (int)$row['is_active'];
    if(!$blink){
      $blink = 'product_route.php?id=';
    }

  }



  if (isset($_POST['update'])) {
    

    $movies_id = $_POST['movies_id'];
    $link = $_POST['link'];
    $page_type = $_POST['page_type'];
    
    $is_active = (int)$_POST['is_active'];
  

    $sql="UPDATE `banners` set id=$id, movies_id=$movies_id, link='$link', page_type='$page_type', is_active='$is_active' where id=$id";

    $result=mysqli_query($con,$sql);
    if($result){
      // echo "Updated successfully";
      header('location:banners.php');
    }else{
      die(mysqli_error($con));
    }
  }  

  
  
  if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
  
    $sql="delete from `banners` where id=$id";
    $result=mysqli_query($con,$sql);
    if ($result) {
      // echo "Deleted Successfull";
      header('location:banners.php');
    }else{
      die(mysqli_error($con));
    }
  }


  
  if (isset($_POST['submit'])) {


    $movies_id = $_POST['movies_id'];
    $link = $_POST['link'];
    $page_type = $_POST['page_type'];
    $is_active = (int)$_POST['is_active'];
  

    $sql="insert into `banners` (movies_id,link,page_type,is_active) values('$movies_id','$link','$page_type',$is_active)";
 

    if ($con->query($sql) === TRUE) {
      $last_id = $con->insert_id;
      

      header('location:banners.php');
     
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


  }  

?>


    <div class="container my-5">

        <h2>Enter your movie bannners</h2>

        <div class="outer-table">
            <table id="datatable" class="table">
                <thead>
                    <tr>
                        <th scope="col">SI no</th>
                        <th scope="col">ID</th>
                        <th scope="col">Movies Id</th>
                        <th scope="col">Link</th>
                        <th scope="col">Page Type</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php  

                        $sql="SELECT * FROM `banners` ORDER BY id DESC";
                        $result=mysqli_query($con,$sql);
                        $rows=mysqli_fetch_all ($result, MYSQLI_ASSOC);

                        
                        $i = 1;
                        if($result){
                            foreach ($rows as $row) {
                                $id=$row['id'];
                                $movies_id=$row['movies_id'];
                                $link = $row['link'];
                                $page_type = $row['page_type'];
                                $is_active = $row['is_active'];

                                
                                echo '	<tr>
                                            <th scope="row">'.$i.'</th>
                                            <th scope="row">'.$id.'</th>
                                            <th>'.$movies_id.'</th>
                                            <th>'.$link.'</th>
                                            <th>'.$page_type.'</th>
                                            <th>'.$is_active.'</th>
                                            <td>
                                                <a href="banners.php?updateid='.$id.'" updateid='.$id.' class="text-light"><button class="btn btn-primary" style="margin-bottom:10px;">Edit</button></a>
                                                <a href="banners.php?deleteid='.$id.'" delteteid='.$id.'
                                                class="text-light"><button class="btn btn-danger">Delete</button></a>
                                            </td>
                                        </tr>';
                                        $i++;
                            }
                        }

                    ?>

                    
                </tbody>
            </table>
        </div>
        
        <?php if (isset($_GET['updateid'])) { ?>
                <h2>Edit</h2>
        <?php   }else { ?>
                <h2>Add New</h2>
        <?php    } ?>
            
        

        <form method="post" enctype="multipart/form-data" class="form-style">
            
            <div class="form-group col-md-6">
                <label>Movies Id</label>
                <input type="text" class="form-control" placeholder="Enter your movies_id" name="movies_id" autocomplete="off" value="<?php echo $bmovies_id; ?>">
            </div>

            <div class="form-group col-md-6">
                <label>Link</label>
                <input type="text" class="form-control" placeholder="Enter your link" name="link" autocomplete="off" value="<?php echo $blink; ?>">
            </div>
                
            <div class="form-group col-md-6 my-3">
            <label class="b-title">Page Type</label>
              <select name="page_type">
                <option value=""> --Select-- </option>
                <option value="home" <?php if($bpage_type == 'home') echo 'selected'; ?>> HOME </option>
                <option value="product" <?php if($bpage_type == 'product') echo 'selected'; ?>> PRODUCT </option>
              </select>
            </div>

            <div class="form-group col-md-6 my-3">
                <label class="b-title">Is Active</label>
                <input type='radio' id='radio_1' class="form-control" name="is_active"  autocomplete="off" value="<?php echo $bis_active; ?>" <?php if($bis_active == 1) echo 'checked' ?>> 
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


            <div class="form-group b-button my-3"> 
              <button type="submit" class="btn btn-primary submit-button b-buttons" name="<?php if(!isset($_GET['updateid'])) echo 'submit'; else echo 'update'; ?>">Submit</button>
            </div>  
        </form>

    </div>


<?php include 'pages/common/foot.php'; ?>