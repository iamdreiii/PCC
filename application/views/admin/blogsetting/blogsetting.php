<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<style>
.box-body {
    display: flex; justify-content: center; align-items: center;
}
.box-body  input{
    width: 300px;
}

</style>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: tomato;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: green;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
  <!-- codemirror -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/theme/blackboard.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/theme/monokai.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/xml/xml.min.js"></script>

  <!-- add summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-ko-KR.min.js"></script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('admin/dashboard/layout/header');?>
  <?php $this->load->view('admin/dashboard/layout/sidebar');?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      <?php echo $title ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Links</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Blog Details</h3>
                </div>
                    <div class="box-body">

                    <div style="display: flex; flex-direction: column; align-items: center;">
                    <div>
                      <label for="navbar">TITLE </label>
                     <textarea name="title" id="title"></textarea>
                     
                    </div>
                    <div>
                      <label for="body">SUBTITLE </label>
                      <textarea name="subtitle" id="subtitle"></textarea>
                    </div>
                    <div>
                      <label for="footer">FOOTER </label>
                      <textarea name="footer" id="footer"></textarea>
                    </div>
                    </div>

                
                    </div>
                    <div class="box-footer" style="text-align: center;">
                        <button class="btn btn-primary" id="saveBtndetails">Save</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
             
             <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">Show Blog Links</h3>
             </div>

                 <div class="box-body">

                 <div>
                 <div class="form-group">
                   <label for="facebook"><i class="fa fa-facebook-square fa-2x"></i></label>&emsp;
                   <label class="switch">
                     <input type="checkbox" name="facebook" id="facebook">
                     <span class="slider round"></span>
                   </label>
                 </div>
                 <div class="form-group">
                     <label for="twitter"><i class="fa fa-twitter-square fa-2x"></i></label>&emsp;
                     <label class="switch">
                       <input type="checkbox" name="twitter"  id="twitter">
                       <span class="slider round"></span>
                     </label>
                 </div>
                 <div class="form-group">
                     <label for="instagram"><i class="fa fa-instagram fa-2x"></i></label>&emsp;
                     <label class="switch">
                       <input type="checkbox" name="instagram"  id="instagram">
                       <span class="slider round"></span>
                     </label>
                 </div>
                 <div class="form-group">
                     <label for="youtube"><i class="fa fa-youtube-square fa-2x"></i></label>&emsp;
                     <label class="switch">
                       <input type="checkbox" name="youtube" id="youtube">
                       <span class="slider round"></span>
                     </label>
                 </div>
                 </div>

             
                 </div>
             </div>
         </div>
            <div class="col-lg-6">
                <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Blog Theme</h3>
                </div>
                  <div class="box-body">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                    <div>
                      <label for="navbar">Navigation Bar </label>
                      <input class="form-control" type="color" id="navbar_color">
                    </div>
                    <div>
                      <label for="body">Body </label>
                      <input class="form-control" type="color" id="body_color">
                    </div>
                    <div>
                      <label for="footer">Footer </label>
                      <input class="form-control" type="color" id="footer_color">
                    </div>
                    </div>
                  </div>

                    <div class="box-footer" style="text-align: center;">
                        <button class="btn btn-primary" id="saveBtncolor">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2023 <a href="#">Pola Community College</a>.</strong> All rights
    reserved.
  </footer>
  <!-- <script>
  $('#title').summernote({height: 100});
  $('#subtitle').summernote({height: 100});
  $('#footer').summernote({height: 100});
  </script> -->
<?php $this->load->view('admin/dashboard/layout/control_sidebar');?>
</div>
<?php $this->load->view('admin/blogsetting/crud');?>
<?php $this->load->view('admin/user/scripts/footer');?>
</body>
</html>
