<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="<?=base_url()?>assets/home/blog/css/mdb.min.css" />
    <!-- Custom styles -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SEARCH -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
</head>
<body>
      <header>
    <!-- Intro settings -->
    <style>
      #intro {
        /* Margin to fix overlapping fixed navbar */
        margin-top: 58px;
      }
      @media (max-width: 991px) {
        #intro {
          /* Margin to fix overlapping fixed navbar */
          margin-top: 45px;
        }
      }
      .navbar{
        background-color: rgb(82, 65, 50);
        color: #fff;
      }
      .navbar .container-fluid .collapse ul li .nav-link{
        color: #fff;
      }
      /* .navbar .container-fluid .collapse ul li a:link {
        color: red;
      } */

      /* visited link */
      .navbar .container-fluid .collapse ul li a:visited {
        color: #fff;
      }

      /* mouse over link */
      .navbar .container-fluid .collapse ul li a:hover {
        color: rgb(201, 201, 201);
        text-decoration: underline;
      }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" target="_blank" href="<?php echo base_url()?>">
          <img src="<?php echo base_url()?>assets/home/images/PCC.png" height="50" alt="" loading="lazy"
            style="margin-top: -3px;" />
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="<?php echo base_url()?>">Home</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow"
                target="_blank">Learn Bootstrap 5</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://mdbootstrap.com/docs/standard/" target="_blank">Download MDB UI KIT</a>
            </li> -->
          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow"
                target="_blank">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.facebook.com/mdbootstrap" rel="nofollow" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://twitter.com/MDBootstrap" rel="nofollow" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://github.com/mdbootstrap/mdb-ui-kit" rel="nofollow" target="_blank">
                <i class="fab fa-github"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Jumbotron -->
    <div id="intro" class="p-5 text-center" style="background-color: rgb(218, 208, 199);">
      <h1 class="mb-3 h1">P C C   &emsp; B L O G</h1>
      <p class="mb-3">Innovative Nationalistic Affective</p>
      <div id="prefetch" style="width:200px; margin:auto; display:flex;">
        <input type="text" name="search_box" id="search_box" class="form-control input-lg typeahead" placeholder="Search Here" />
      </div>
    </div>
    <!-- Jumbotron -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="my-5" >
    <div class="container" >
      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Latest posts</strong></h4>

        <div class="row"  id="video-card">

         
        
        </div>
        <button id="show-more" style="display:none">Show More</button>
      </section>
      <!--Section: Content-->

      <!-- Pagination -->
      <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">
    <!-- <div class="py-4 text-center">
      <a role="button" class="btn btn-primary btn-lg m-2"
        href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow" target="_blank">
        Learn Bootstrap 5
      </a>
      <a role="button" class="btn btn-primary btn-lg m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank">
        Download MDB UI KIT
      </a>
    </div> -->

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>Follow PCC on social media</p>
      <a href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" class="btn btn-primary m-1" role="button"
        rel="nofollow" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://www.facebook.com/mdbootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-github"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(144, 115, 88);">
      © 2023 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">pcc.edu.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="<?=base_url()?>assets/home/blog/js/mdb.min.js"></script>
    <!-- Custom scripts -->

    <script>
    var videoCount = 0;
    updateVideoContainer();

    $(document).ready(function() {
        // Call the function to update the video container every 5 seconds
        setInterval(updateVideoContainer, 5000);

        // Show more button click event
        $('#show-more').on('click', function() {
            videoCount += 10;
            updateVideoContainer();
        });
    });

    // Function to update the video container using AJAX
    function updateVideoContainer() {
        $.ajax({
            url: '<?php echo base_url('Blog/viewfiles_ajax'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Loop through the returned videos and append new ones to the video container
                $.each(data, function(index, video) {
                    if (videoCount <= index && index < videoCount + 10) {
                        let objectDate = new Date(video.created_at);
                        let day = objectDate.getDate();
                        let month = objectDate.toLocaleString('default', { month: 'long' });
                        let year = objectDate.getFullYear(video.created_at);
                        if ($('#video-card').find('#post-' + video.id).length == 0) {
                            var $video = 
                            $('<div class="col-lg-4 col-md-12 mb-4" id="post-' + video.id + '">'+
                                '<div class="card">'+
                                '<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">'+
                                    '<video class="img-fluid" controls></video>'+
                                '</div>'+
                                '<div class="card-body">'+
                                    '<a href="#'+video.id+'"><h5 class="card-title">'+  video.title.toUpperCase() +'</h5></a>'+
                                    '<p class="card-text">'+  video.description +'</p>'+
                                    '<a href="#!" class="btn btn-primary">Read</a>'+
                                '</div>'+
                                '</div>'+
                            '</div>');
                            var $source = $('<source></source>&emsp;').attr('src', video.path + '.mp4').attr('type', 'video/mp4');
                            $video.find('.bg-image video').append($source);
                            $('#video-card').append($video);
                        }
                    }
                });

                // Remove videos that no longer exist in the database
                $('#video-card .bg-image video').each(function() {
                        var src = $(this).find('source').attr('src');
                        var exists = false; // set to false by default
                        $.each(data, function(index, video) {
                            if (video.path + '.mp4' == src) {
                                exists = true;
                                return false;
                            }
                        });
                        if (!exists) {
                            //$(this).remove();
                            $(this).closest('.col-lg-4').remove();
                        }
                    });

                    // Show more button
                    if (videoCount + 10 < data.length) {
                        $('#show-more').show();
                    } else {
                        $('#show-more').hide();
                    }
            }
        });
    }
</script>
<script>
$(document).ready(function(){
  var sample_data = new Bloodhound({
   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
   queryTokenizer: Bloodhound.tokenizers.whitespace,
   prefetch:'<?php echo base_url(); ?>Blog/fetch',
   remote:{
    url:'<?php echo base_url(); ?>Blog/fetch/%QUERY',
    wildcard:'%QUERY'
   }
  });
  

  $('#prefetch .typeahead').typeahead(null, {
   name: 'sample_data',
   display: 'name',
   source:sample_data,
   limit:5,
   templates:{
    suggestion:Handlebars.compile('\
    <div class="row" style="width:200px;justify-content: center; ">\
    <div class="col-md-8">\
        <video src="<?=base_url()?>{{path}}.mp4" class="img-thumbnail"></video>\
    </div>\
    <div class="col-md-4">\
        <div style="background-color: white;">\
            <a href="#{{title}}" style="float: right;">{{title}}</a>\
        </div>\
    </div>\
</div>\
<hr>\
    ')
   }
  });
});
</script>
<style>
    .img-thumbnail{
        padding: 0px;
        margin: 0px;
        width: 100px;
        
    }
    .row .row:hover{
        background-color:tomato;
    }
</style>
</body>
</html>