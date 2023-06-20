<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PCC</title>
  
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/home/images/PCC.png" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="<?php echo base_url()?>assets/toastr/toastr.css" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href="<?=base_url()?>assets/dist/js/modals/css/style.css" > -->
  <style>
    #loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    #loading-spinner {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: 3px solid #fff;
      border-top-color: #007bff;
      animation: rotate 1s linear infinite;
    }
    @keyframes rotate {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    .bootstrap-tagsinput {
  margin: 0;
  width: 100%;
  padding: 0.5rem 0.75rem 0;
  font-size: 2rem;
  line-height: 1.25;
  transition: border-color 0.15s ease-in-out;
}

.bootstrap-tagsinput.has-focus {
  background-color: #fff;
  border-color: #5cb3fd;
}

.bootstrap-tagsinput .label-info {
  display: inline-block;
  font-size: 2.8rem; /* Adjust the font size as needed */
  background-color: gray !important;
  padding: 0 .4em .15em;
  border-radius: .25rem;
  margin-bottom: 0.4em;
}


.bootstrap-tagsinput input {
  margin-bottom: 0.5em;
}

.bootstrap-tagsinput .tag [data-role="remove"]:after {
  content: '\00d7';
}


.bootstrap-tagsinput {
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  display: inline-block;
  padding: 4px 6px;
  margin-bottom: 10px;
  color: #555;
  vertical-align: middle;
  border-radius: 4px;
  max-width: 100%;
  line-height: 22px;
  cursor: text;
}
.bootstrap-tagsinput input {
  border: none;
  box-shadow: none;
  outline: none;
  background-color: transparent;
  padding: 0;
  margin: 0;
  width: auto !important;
  max-width: inherit;
}
.bootstrap-tagsinput input:focus {
  border: none;
  box-shadow: none;
}
.bootstrap-tagsinput .tag {
  margin-right: 2px;
  color: white;
}
.bootstrap-tagsinput .tag [data-role="remove"] {
  margin-left: 8px;
  cursor: pointer;
}
.bootstrap-tagsinput .tag [data-role="remove"]:after {
  content: "x";
  padding: 0px 2px;
}
.bootstrap-tagsinput .tag [data-role="remove"]:hover {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}
  </style>


</head>
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
            <button class="btn btn-sm btn-success" onclick="add_student()"><i class="glyphicon glyphicon-plus"></i> Add Student</button>
            <!-- <button id="delete-selected" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete Selected</button> -->
            <button id="update_btn" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i> Add/Update Class ID</button>
            
            </div>
            <div class="row" style="padding-left: 20px;">
              <div class="col-xs-2">
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
                    <th><input type="checkbox" id="select-all"></th>
                    <th>SID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Year Lvl</th>
                    <th width="8%">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>SID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Year Lvl</th>
                    <th width="8%">Action</th>
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
<script src='<?=base_url()?>assets/script/jquery-3.2.1.min.js'></script>

<?php $this->load->view('admin/student/modals');?>
<?php $this->load->view('admin/student/scripts/student_crud');?>

<script src="<?=base_url()?>assets/dist/js/modals/js/bootstrap-tagsinput.min.js"></script>
<script>
  $(document).ready(function() {
    const $tagsInput = $('.bootstrap-tagsinput');
    const $input = $tagsInput.find('input');

    $input.tagsinput({
      trimValue: true,
      confirmKeys: [13, 44, 32],
      focusClass: 'my-focus-class'
    });

    $input.on('focus blur', function() {
      $tagsInput.toggleClass('has-focus', $(this).is(':focus'));
    });
  });
</script>



<!-- <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>

<script>
window.addEventListener('load', function() {
  var loadingOverlay = document.getElementById('loading-overlay');
  loadingOverlay.style.display = 'none';
});

</script>


</body>
</html>
sodium_crypto_generichash_update$(document).ready(function() {
  const $input = $('#input');

  $input.tagsinput({
    trimValue: true,
    confirmKeys: [13, 44, 32],
    focusClass: 'my-focus-class'
  });

  $input.on('itemAdded itemRemoved', function() {
    const inputData = $input.tagsinput('items');
    console.log(inputData); // Display the input data in the browser console
  });
});