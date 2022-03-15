<?php 
include '../pages/common/common_php.php'; 
include '../pages/common/connect.php';

$jsonResponse = array();
$jsonResponse['status'] = 'error';
$jsonResponse['message'] = 'Error while uploading file';
if(!empty($_FILES['file'])){ 
    $movie_id = $_POST['movie_id'];
    $seasons = $_POST['seasons'];
    $episode = $_POST['episode'];

    $sql="SELECT m.video_id, v.link as video_link
                FROM movie_details as m
                LEFT OUTER Join videos as v on (m.video_id = v.id) WHERE m.id=$movie_id";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_all ($result, MYSQLI_ASSOC);

    $video_id = $rows[0]['video_id'];
    $video_link = $rows[0]['video_link'];

    // File upload configuration 
    $targetDir = "../../uploads/movies/"; 
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif', 'mp4', 'avi'); 
     
    $fileName = basename(date("Ymdhs",time()).$_FILES["file"]["name"]); 
    $targetFilePath = $targetDir.$fileName;
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if($video_link){
        if (file_exists(getenv('FILE_URL').$video_link)) {
            unlink(getenv('FILE_URL').$video_link);
        }
    }

    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){ 
            $jsonResponse['status'] = 'success'; 
        } 
    } 
    $file_link = substr($targetFilePath, 6);
    $duration = 0; //calculate later
    $file_type = $_FILES['file']['type'];
    
    
    if($jsonResponse['status'] == 'success'){
        $sql="INSERT into `videos` (seasons, episode, name, link, file_type, duration) values('$seasons', '$episode', '$fileName', '$file_link', '$file_type', $duration)";

        if ($con->query($sql) === TRUE) {
            $last_id = $con->insert_id;

            $sql="UPDATE `movie_details` set video_id=$last_id where id=$movie_id";

            $result=mysqli_query($con,$sql);
            if($result){
                $jsonResponse['message'] = 'File uploaded successfully';
            }else{
                $jsonResponse['message'] = 'Error while updating in db';
            }
        } else {
            $jsonResponse['message'] = 'Error while inserting in db';
        }
    }
   
} 
echo json_encode($jsonResponse); 

 ?>