<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PCC | Blog</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/home/images/PCC.png" />
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
      body{
        margin: 0;
      }
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
        background-color: <?= $navbar_color?>;
        color: #fff;
      }
      .navbar .container-fluid .collapse ul li .nav-link{
        color: #fff;
      }
      /* visited link */
      .navbar .container-fluid .collapse ul li a:visited {
        color: #fff;
      }

      /* mouse over link */
      .navbar .container-fluid .collapse ul li a:hover {
        color: rgb(201, 201, 201);
        text-decoration: underline;
      }
      .blog-footer{
        background-color: <?= $footer_color?>; 
        position: relative; 
        width: 100%;
        overflow: hidden;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 9999;
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
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="<?php echo base_url()?>blog">Blog</a>
            </li>
          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <?php if($yt == 1) :?>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="" id="youtube" rel="nofollow"
                target="_blank">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <?php endif ?>
            <?php if($fb == 1) :?>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="" id="facebook" rel="nofollow" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <?php endif ?>
            <?php if($tw == 1) :?>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="" id="twitter" rel="nofollow" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <?php endif ?>
            <?php if($ig == 1) :?>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="" id="instagram" rel="nofollow" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Jumbotron -->
    <div id="intro" class="p-5 text-center" style="background-color: <?= $body_color?>;">
      <h1 class="mb-3 h1"><?= $title?></h1>
      <p class="mb-3"><?= $subtitle?></p>
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
        <h4 class="mb-5"><strong>View Post</strong></h4>

        <div class="row"  id="video-card">
        <?php foreach($blogres as $row) :
          $file_name = $row->path;
          $extension = pathinfo($file_name, PATHINFO_EXTENSION);
          ?>
         <?php  if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {?>
          <div class="col-lg-12 col-md-12 mb-4" id="post- video.id + '">
          <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img class="img-fluid" src="<?php echo base_url().$row->path?>" style="width:100%;min-height:500px;height:600px;max-height:100%;"></img>
          </div>
          <div class="card-body">
          <h5 class="card-title"><?php echo strtoupper($row->title); ?></h5>
          <p class="card-text" style="text-align: justify;"><?php echo $row->description; ?></p>
          </div>
          </div>
          </div>'
          <?php }else{?>
          <div class="col-lg-12 col-md-12 mb-4" id="post-' + video.id + '">
          <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <video class="img-fluid" style="width:100%;height:100%;" controls><source src="<?php echo base_url().$row->path; ?>"></video>
          </div>
          <div class="card-body">
              <h5 class="card-title"><?php echo strtoupper($row->title); ?></h5>
              <p class="card-text" style="text-align: justify;"><?php echo $row->description; ?></p>
          </div>
          </div>
          </div>
          <?php }?>
        <?php endforeach?>
        </div>
        <nav class="my-4">
          <ul class="pagination pagination-circle justify-content-center">
            <li class="page-item">
            <a href="<?=base_url()?>blog" class="btn btn-primary">Back</a>
            </li>
          </ul>
        </nav>
      </section>
      <!--Section: Content-->
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>Follow PCC on social media</p>
      <?php if($yt == 1) :?>
      <a href="" id="yt" class="btn btn-primary m-1" role="button"
        rel="nofollow" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <?php endif?>
      <?php if($fb == 1) :?>
      <a href="" id="fb" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <?php endif?>
      <?php if($tw == 1) :?>
      <a href="" id="tw" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <?php endif?>
      <?php if($ig == 1) :?>
      <a href="" id="ig" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
      <?php endif?>
    </div>

    <!-- Copyright -->
    <div class="blog-footer text-center p-3">
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
document.addEventListener('DOMContentLoaded', function() {
  
  fetch('<?=base_url()?>Links/fetchlinks')
    .then(response => response.json())
    .then(data => {
      const { facebook, twitter, instagram, youtube, gmail } = data;
      <?php if($yt == 1) :?>
        document.getElementById('youtube').href = youtube || '';
        document.getElementById('yt').href = youtube || '';
      <?php endif?> 
      <?php if($fb == 1) :?>
        document.getElementById('facebook').href = facebook || '';
        document.getElementById('fb').href = facebook || '';
      <?php endif?> 
      <?php if($tw == 1) :?>
        document.getElementById('twitter').href = twitter || '';
        document.getElementById('tw').href = twitter || '';
      <?php endif?> 
      <?php if($ig == 1) :?>
        document.getElementById('ig').href = instagram || '';
        document.getElementById('instagram').href = instagram || '';
      <?php endif?> 
      
    })
    .catch(error => console.error(error));
});
</script>
</body>
</html>