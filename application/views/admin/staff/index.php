<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('admin/dashboard/layout/header');?>
  <?php $this->load->view('admin/dashboard/layout/sidebar');?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      <?php echo $title ?>
        <small>School Year list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">School-Year</a></li>
        <li class="active">list</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
         

          <div class="box">
            <div class="btn float-right">
            <button class="btn btn-success" onclick="add_staff()"><i class="glyphicon glyphicon-plus"></i> Staff</button>
            </div>
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Usertype</th>
                    <th>Active Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th style="width: 10%;">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Usertype</th>
                    <th>Active Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th style="width: 10%;">Action</th>
                </tr>
                </tfoot>
              </table>
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
<?php $this->load->view('admin/staff/modals');?>
<?php $this->load->view('admin/staff/crud');?>
<?php $this->load->view('admin/user/scripts/footer');?>
</body>
</html>
