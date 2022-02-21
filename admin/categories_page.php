<?php include 'pages/common/head.php'; ?>

<?php 

   $category_show = "";

  if (isset($_GET['updateid'])) {
    $id=$_GET['updateid'];
    $sql="SELECT * FROM `categories` where id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $category_show = $row['category'];
  }



  if (isset($_POST['update'])) {
    

    $category = $_POST['category'];
  

    $sql="UPDATE `categories` set id=$id, category='$category' where id=$id";

    $result=mysqli_query($con,$sql);
    if($result){
      // echo "Updated successfully";
      header('location:categories_page.php');
    }else{
      die(mysqli_error($con));
    }
  } 
  
  
  if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
  
    $sql="delete from `categories` where id=$id";
    $result=mysqli_query($con,$sql);
    if ($result) {
      // echo "Deleted Successfull";
      header('location:categories_page.php');
    }else{
      die(mysqli_error($con));
    }
  }


  
  if (isset($_POST['submit'])) {


    $category = $_POST['category'];
  

    $sql="insert into `categories` (category) values('$category')";
 

    if ($con->query($sql) === TRUE) {
      $last_id = $con->insert_id;
      

      header('location:categories_page.php');
     
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


  }  

?>


    <div class="container my-5">

        <h2>Welcome to Category Page</h2>

        <div class="outer-table">
            <table id="datatable" class="table">
                <thead>
                    <tr>
                        <th scope="col">SI no</th>
                        <th scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php  

                        $sql="SELECT * FROM `categories` ORDER BY id DESC";
                        $result=mysqli_query($con,$sql);
                        $rows=mysqli_fetch_all ($result, MYSQLI_ASSOC);

                        
                        $i = 1;
                        if($result){
                            foreach ($rows as $row) {
                                $id=$row['id'];
                                $category = $row['category'];

                                
                                echo '	<tr>
                                            <th scope="row">'.$i.'</th>
                                            <th scope="row">'.$id.'</th>
                                            <th>'.$category.'</th>
                                            <td>
                                                <a href="categories_page.php?updateid='.$id.'" updateid='.$id.' class="text-light"><button class="btn btn-primary" style="margin-bottom:10px;">Edit</button></a>
                                                <a href="categories_page.php?deleteid='.$id.'" delteteid='.$id.'
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

            <div class="form-group col-md-8">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Enter Your Movie Category" name="category" autocomplete="off" value="<?php echo $category_show; ?>">
            </div>


            <div class="form-group col-md-8"> 
              <button type="submit" class="btn btn-primary submit-button" name="<?php if(!isset($_GET['updateid'])) echo 'submit'; else echo 'update'; ?>">Submit</button>
            </div>  
        </form>

    </div>


<?php include 'pages/common/foot.php'; ?>