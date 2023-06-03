<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<style>
/* Print-specific style */
@media print {
  #checkAll {
    display: none !important; /* Hide the button when printing */
  }
  #selected {
    display: none !important; /* Hide the button when printing */
  }
}
</style>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <?php $this->load->view('admin/dashboard/layout/header');?>
  <?php $this->load->view('admin/dashboard/layout/sidebar');?>

<div class="content-wrapper">

<section class="content-header">
<h1>
<?= $title ?>
<small>#<??></small>
</h1>
<ol class="breadcrumb">
<li><a href="#" id="backButton"><i class="fa fa-dashboard"></i> Manage Student</a></li>
<li><a href="#">Subject</a></li>
<li class="active">Loads</li>
</ol>
</section>

<section class="invoice">

<div class="row" style="margin-top: 5px; margin-bottom: 5px;">
  <div class="col-xs-12 text-center">
    <div class="d-flex justify-content-center align-items-center">
      <div style="position: absolute; left: 10%; top: 0;">
        <img src="<?= base_url()?>assets/img/PCC.png" alt="" style="width:70px; height:70px;">
      </div>
      <div style="margin-left: auto; margin-right: auto;">
        <h2 style="margin-top: 5px; margin-bottom: 5px;">
          <b>POLA COMMUNITY COLLEGE</b>
        </h2>
      </div>
    </div>
    <h5 style="margin-top: 5px; margin-bottom: 5px;"><b>Zone II, Pola Oriental Mindoro</b></h5>
    <h6 style="margin-top: 5px; margin-bottom: 5px;"><b>Phone: +(63)9560875992 | E-mail: polacommunitycollege2020@gmal.com</b></h6>
    <hr style="margin-top: 2px; margin-bottom: 2px;">
    <hr style="margin-top: 2px; margin-bottom: 2px;">
    <h4><b>OFFICE OF THE REGISTRAR</b></h4>
    <h4><b>SUBJECT LOADS</b></h4>
  </div>
</div>



<?php foreach($student_data as $row) :?>
<div class="row invoice-info">
<div class="col-sm-10 invoice-col">
<address style="white-space: nowrap;">
  Name : <?= ucfirst($row['lname'])?>, <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?><br>
  Address : <?= ucfirst($row['address'])?> <?= ucfirst($row['city_municipality'])?> <?= ucfirst($row['province'])?><br>
  Course : <?php if($row['program'] = 'BSE') {echo 'Bachelor of Science in Entrepreneurship';}else{echo 'Bachelor of Public Administration';}?><br>
  Date of Admission : <br>
  Place of Birth :  <?= ucfirst($row['birthplace'])?><br>
  Elementary  Course Completed :  <?= ucfirst($row['primary_school_last_attended'])?><br>
  High Shool Course Completed :  <?= ucfirst($row['secondary_school_last_attended'])?><br>
</address>
</div>


<div class="col-sm-2 invoice-col pull-right">
<address style="white-space: nowrap;">
  Admission Credential: Form 138-A<br>
  Date of Birth: <?= ucfirst($row['birthdate'])?> <br><br><br><br>
  School Year :  <?= ucfirst($row['primary_school_year_last_attended'])?><br>
  School Year :  <?= ucfirst($row['secondary_school_year_last_attended'])?><br>
</address>
</div>

</div>
<?php endforeach?>
<!-- END HEADER -->



<div class="row">
<div class="col-xs-12 table-responsive">



<div class="row">
  <div class="col-xs-2">
    <label>Year Level:</label>
    <select class="form-control" id="filter_year_level" name="filter_year_level">
      <!-- Your options for year levels go here -->
    </select>
  </div>
</div>
<table id="myTable" class="table table-striped table-bordered">
  <!-- The table contents will be generated dynamically -->
</table>


</div>

</div>




<div class="row no-print">
<div class="col-xs-12">
<button class="btn btn-default" id="backButton1"><i class="fa fa-arrow-left"></i> Back</button>

<!-- Add the "id" attribute to the Delete Loads button for easy reference in JavaScript -->
<button href="#" id="addLoads" class="btn btn-primary pull-right"><i class="fa fa-book"></i> Add Loads</button>

</div>
</div>
</section>

<div class="clearfix"></div>
</div>

<footer class="main-footer no-print">
<div class="pull-right hidden-xs">
<b>Version</b> 2.4.13
</div>
<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
reserved.
</footer>

<?php $this->load->view('admin/dashboard/layout/control_sidebar');?>
</div>
<?php $this->load->view('admin/user/scripts/footer');?>
<?php $this->load->view('admin/student_subjects/scripts/add_student_loads');?>
</body>
</html>
