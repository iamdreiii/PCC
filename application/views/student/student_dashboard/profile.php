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
    <h1>
    User Profile
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">User profile</li>
    </ol>
    </section>

    <section class="content">
        <div class="row">
        <div class="col-md-3" >

        <div class="box box-primary" style="height: 250;">
            <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>assets/dist/img/avatar3.png" alt="User profile picture">
            <h3 class="profile-username text-center"><?php echo strtoupper($username)?></h3>
            <p class="text-muted text-center"></p>
            <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
            <b>created_at: </b> <a class="pull-right"><?php echo date('F d, Y - h : i a', strtotime($created_at))?></a>
            </li>
            <li class="list-group-item">
            <b>updated_at:</b> <a class="pull-right"><?php echo date('F d, Y - h : i a', strtotime($updated_at))?></a>
            </li>
            </ul>
            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>

        </div>

        </div>

        <div class="col-md-9">
        <div class="nav-tabs-custom"  style="height: 265px;">
        <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
        <div class="tab-content">
       

        <div class="tab-pane active" id="settings">
        <form class="form-horizontal">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputUsername" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Save</button>
            </div>
        </div>
        </form>
        </div>

        </div>

        </div>

        </div>

        </div>

    </section>
    <section class="content">
        <div class="row">
        <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
            </div>

            <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
            <p class="text-muted">
            B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>
            <hr>
            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
            <p class="text-muted">Malibu, California</p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            <p>
            <span class="label label-danger">UI Design</span>
            <span class="label label-success">Coding</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
            </p>
            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
</body>
</html>
