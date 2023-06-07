<!DOCTYPE html>
<html>
    
<?php $this->load->view('admin/user/layout/head');?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('admin/dashboard/layout/header');?>
  <?php $this->load->view('admin/dashboard/layout/sidebar');?>
<div class="content-wrapper">
<?php
$user = $this->session->userdata('user');
extract($user);
?>
    <section class="content-header">
    <h1><i class="fa fa-database"></i>
    <?=$title?>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">User profile</li>
    </ol>
    </section>

    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
               
                <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" id="settingsForm">
                    
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-10">
                        <button type="button" class="btn btn-success" id="backup" onclick="performBackup()"> <i class="fa fa-download"></i> Export</button>
                        </div>
                    </div>
                    </form>
                </div>
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
<?php $this->load->view('admin/user/scripts/footer');?>
<?php $this->load->view('admin/backup/script');?>

</body>
</html>
