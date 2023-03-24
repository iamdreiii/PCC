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
            <div class="btn float-right">
            <button class="btn btn-sm btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Add Student</button>
            <button id="delete-selected" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete Selected</button>
            <button id="update_btn" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i> Add/Update Class ID</button>
            <button class="btn btn-sm btn-success" onclick="add_user2()"><i class="glyphicon glyphicon-plus"></i> Add Student</button>
            </div>
            <!-- <div class="row" style="padding-left: 20px;">
              <div class="col-xs-2">
                <label>Class:</label>
                <select class="form-control" id="filter_class" name="filter_class">
                  <option value="*">All</option>
                </select>
              </div>
              <div class="col-xs-3">
                <label>Year Level:</label>
                <select class="form-control" id="filter_year_level" name="filter_year_level">
                  <option value="*">All</option>
                </select>
              </div>
              <div class="col-xs-2">
                <label>Gender:</label>
                <select class="form-control" id="filter_gender" name="filter_gender">
                  <option value="*">All</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div> -->

            <div class="box-body">
              <table id="table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>School ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Year Lvl</th>
                    <th>Status</th>
                    <th width="14%">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>School ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Year Lvl</th>
                    <th>Status</th>
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
<?php $this->load->view('admin/user/modals');?>
<?php $this->load->view('admin/user/scripts/user_crud');?>
<?php $this->load->view('admin/user/scripts/footer');?>
</body>
</html>
