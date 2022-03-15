<?php include 'pages/common/head.php'; ?>



<div class="container my-5 border border-danger col-md-3">

    <div class="video-container" >
        <video width='100%' controls autoplay id="preview" style="display:none"></video>
    </div>  

    
    <!-- File upload form -->
    <form id="uploadForm" enctype="multipart/form-data" class="my-3" method="post">

        <input type="hidden" name="movie_id" id="movie_id" value="<?php echo $_GET['updateid']; ?>">
        <label>Choose File:</label>
        <input type="file" class="p-2 mb-2 bg-info text-white" name="file" id="file" accept="video/*">

        <div class="form-group">
          <label>Seasons:</label>
          <input type="number" id="tentacles" name="seasons" min="1" max="20">
        </div>

        <div class="form-group">
          <label>Episode:</label>
          <input type="number" id="tentacles" name="episode" min="1" max="100">
        </div>

        <input type="submit" class="btn btn-primary my-3 upload-movie" name="submit" value="UPLOAD"/>
        <a href="index.php" class="text-light"><div class="btn btn-primary my-3 back-button" style="display:none">Back Home</div></a>
    </form>

    <!-- Progress bar -->
    <div class="progress">
        <div class="progress-bar"></div>
    </div>

    <!-- Display upload status -->
    <div id="uploadStatus"></div>

   
</div>


<script type="text/javascript">

    $(document).on("change", "#file", function(evt) {
    var $source = $('#preview');
    $source[0].src = URL.createObjectURL(this.files[0]);
    $('#preview').show();
    });


    $(document).ready(function(){
        // File upload via Ajax
        $("#uploadForm").on('submit', function(e){
            var formData = new FormData(this);
            e.preventDefault();
            
            // formData.append('file', $('#fileInput')[0].files[0]);
            // formData.append('movie_id', $('#movie_id').val());
            // Display the values
            for (var value of formData.values()) {
            console.log(value);
            }
            $(".upload-movie").hide();
            $(".back-button").show();

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $(".progress-bar").width(percentComplete + '%');
                            $(".progress-bar").html(percentComplete+'%');
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: './modal/upload_movie.php',
                data: formData,
                // data: {file :new FormData(this)} ,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $(".progress-bar").width('0%');
                    $('#uploadStatus').html('<img src="static/images/loading.gif"/>');
                },
                error:function(){
                    $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
                },
                success: function(response){
                    console.log(response);
                    response = JSON.parse(response);
                    if(response['status'] == 'success'){
                        $('#uploadForm')[0].reset();
                        $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
                    }else if(response['status'] == 'error'){
                        $('#uploadStatus').html('<p style="color:#EA4335;">'+response['message']+'</p>');
                    }
                }
            });
        });
        
        // File type validation
        $("#fileInput").change(function(){
            var allowedTypes = ['video/mp4'];
            var file = this.files[0];
            var fileType = file.type;
            if(!allowedTypes.includes(fileType)){
                alert('Please select a valid file (MP4).');
                $("#fileInput").val('');
                return false;
            }
        });
    });
</script>



<?php include 'pages/common/foot.php'; ?>