<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<style>
    .box-body .my-input{
        display: flex; justify-content: center; align-items: center;
    }
    .box-body .my-input input{
        width: 300px;
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('admin/dashboard/layout/header');?>
  <?php $this->load->view('admin/dashboard/layout/sidebar');?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      <?php echo $title ?>
        <small>Social Media Links</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Links</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 40vh;">
                        <div>
                            <div class="form-group my-input">
                                <label for="facebook"><i class="fa fa-facebook-square fa-2x"></i></label>&emsp;
                                <input class="form-control" type="text" id="facebook" name="facebook" placeholder="Facebook URL">
                            </div>
                            <div class="form-group my-input">
                                <label for="twitter"><i class="fa fa-twitter-square fa-2x"></i></label>&emsp;
                                <input class="form-control" type="text" id="twitter" name="twitter" placeholder="Twitter URL">
                            </div>
                            <div class="form-group my-input">
                                <label for="instagram"><i class="fa fa-instagram fa-2x"></i></label>&emsp;
                                <input class="form-control" type="text" id="instagram" name="instagram" placeholder="Instagram URL">
                            </div>
                            <div class="form-group my-input">
                                <label for="youtube"><i class="fa fa-youtube-square fa-2x"></i></label>&emsp;
                                <input class="form-control" type="text" id="youtube" name="youtube" placeholder="Youtube URL">
                            </div>
                            <div class="form-group my-input">
                                <label for="gmail"><i class="fa fa-envelope-square fa-2x"></i></label>&emsp;
                                <input class="form-control" type="text" id="gmail" name="gmail" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer" style="text-align: center;">
                        <button class="btn btn-primary" id="saveBtn">Save</button>
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

<?php $this->load->view('admin/dashboard/layout/control_sidebar');?>
</div>
<?php $this->load->view('admin/schoolyear/modals');?>
<?php $this->load->view('admin/link/crud');?>
<?php $this->load->view('admin/user/scripts/footer');?>
</body>
</html>
