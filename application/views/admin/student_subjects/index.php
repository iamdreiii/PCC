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
        <small>students list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Students</a></li>
        <li class="active">lists</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
         

          <div class="box">
            
            <div class="row" style="padding-left: 20px;">
              <div class="col-xs-3">
                <label>Program:</label>
                <select class="form-control" id="filter_program" name="filter_program">
                </select>
              </div>
              <div class="col-xs-2">
                <label>Year Level:</label>
                <select class="form-control" id="filter_year_level" name="filter_year_level">
                </select>
              </div>
            </div>

            <div class="box-body table-responsive">
              <table id="table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                    <!-- <th width="2%"><input type="checkbox" id="select-all"></th> -->
                    <th>SID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Year Lvl</th>
                    <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <!-- <th width="2%"></th> -->
                    <th>SID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Year Lvl</th>
                    <th width="20%">Action</th>
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
    <strong>Copyright &copy; 2023-2024 <a href="<?=base_url()?>dashboard">Pola Community College</a>.</strong> All rights
    reserved.
  </footer>

<?php $this->load->view('admin/dashboard/layout/control_sidebar');?>
</div>
<?php $this->load->view('admin/student_subjects/modals');?>

<?php $this->load->view('admin/user/scripts/footer');?>
<?php $this->load->view('admin/student_subjects/scripts/crud');?>
</body>
</html>
