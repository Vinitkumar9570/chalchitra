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

  <link rel="stylesheet" href="https://cdnjs.cloudlflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  </head>

  <body>
    
    <?php include "pages/common/header.php"; ?>

    <div class="v-container">
        <div class="c-video">
            <video class="video" src="images/sample-mp4-file.mp4"></video>
            <div class="v-controls">
                <div class="v-red-bar">
                    <!--
                        inputs are self-closing tags. You don't need a closing tag for it!
                        Self-closing tags are single tagged elements - you only need to
                        add a slash before '>', like so: <input />
                    -->
                    <input class="red-juice" type="range" min="1" max="100" step="1" value="1" />

                </div>

            </div>
            <div class="v-buttons">
                <button id="play-pause"></button>
            </div>
            <div class="v-title"></div>
            <div class="v-goback">
                <button class="v-back" onclick="goBack()"></button>
            </div>
        </div>
    </div>

    <?php include "pages/common/footer.php"; ?>

    <?php include "pages/common/social_media.php"; ?>

    <?php include "pages/common/bottom_link.php"; ?>


    <!-- Main Script -->
    <script src="js/script.js"></script>

  </body>

  <script>

    var video = document.querySelector(".video");
    var juice = document.querySelector(".red-juice");
    var btn = document.getElementById("play-pause");

    function togglePlayPause() {
    if (video.paused) {
        btn.className = 'pause';
        video.play();
    } else {
        btn.className = 'play';
        video.pause();
    }
    }

    btn.onclick = function(params) {
    //video.fastSeek(570); // 9:30
    // video.currentTime = 570; //test
    togglePlayPause();
    }

    video.addEventListener('timeupdate', function() {

    if (video.ended) {
        btn.className = "play";
        // At the end of the movie, reset the position to the start and pause the playback.
        video.currentTime = 0;
        togglePlayPause();
    }
    });

    function slidingProgress() {
    // this.value will not work here, since it points to the global window obj
    // so I'm using juice.value instead
    // See: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/this#Function_context
    juice.style.background = 'linear-gradient(to right, red ' + juice.value * 100 / juice.max + '%, rgba(0, 0, 0, 0.4) ' + juice.value + '%, rgba(0, 0, 0, 0.4) 100%)'
    }

    video.addEventListener('timeupdate', () => {
    juice.value = video.currentTime / video.duration * juice.max
    slidingProgress() // Call your function here to update .red-juice
    })

    juice.addEventListener('change', () => {
    video.currentTime = video.duration * juice.value / juice.max
    })

    // And finally assign it to juice.oninput
    juice.oninput = slidingProgress;

    // you're not specifying any events to listen to here, so it wouldn't work
    // juice.addEventListener(slidingProgress);

    function goBack() {
    window.history.back();
    }


  </script>

</html>