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
        <small>Subjects list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Subject</a></li>
        <li class="active">list</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
         

          <div class="box">
            <div class="btn float-right">
            <button class="btn btn-success" onclick="add_class()"><i class="glyphicon glyphicon-plus"></i> Subject</button>
            </div>
            <div class="box-body table-responsive">
              <table id="example" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Class Name</th>
                    <th>Year Level</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th style="width:10%">Action</th>
                </tr>
                </thead>
                  <tbody>

                  </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Class Name</th>
                    <th>Year Level</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th style="width:10%">Action</th>
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
<?php $this->load->view('admin/class/modals');?>
<?php $this->load->view('admin/user/scripts/footer');?>
<?php $this->load->view('admin/class/crud');?>

</body>
</html>
