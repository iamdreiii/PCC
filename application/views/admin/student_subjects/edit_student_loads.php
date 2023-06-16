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


<div class="row">
<div class="col-xs-12 table-responsive">
<?php
$total_units = 0; // Initialize total units to 0
foreach($student_loads as $row) {
    $total_units += $row['units']; // Add the units of each row to the total units
}
?>
<table id="myTable" class="table table-striped table-bordered">


<table  id="myTable" class="table table-striped table-bordered">
<thead>
<tr>
<th><input id="checkAll" type="checkbox" ></th>
<th>COURSE CODE</th>
<th>COURSE DESCRIPTION</th>
<th>UNITS</th>
<th>PRE-REQ</th>
</tr>
</thead>
<tbody>
<?php if(empty($student_loads)) : ?>
<tr>
<td colspan="5" style="text-align: center;">No Matching Records</td>
</tr>
<?php else : ?>
<tr>
  <td colspan="5" style="text-align: center;"><strong><u>First Semester : <?= $sy?></u></strong></td>
</tr>
<?php foreach($student_loads as $row) :?>
<?php if($row['semester'] == 1) {?>
<tr>
  <td><input type="checkbox" name="selected[]" id="selected" value="<?php echo $row['sl_id'];?>"></td>
  <td><?php echo $row['coursecode']?></td>
  <td><?php echo $row['description']?></td>
  <td><?php echo $row['units']?></td>
  <td><?php echo $row['pre_req']?></td>
</tr>
<?php }?>
<?php endforeach?>
<?php 
$has_second_semester = false;
foreach($student_loads as $row) {
  if($row['semester'] == 2) {
    $has_second_semester = true;
    break;
  }
}
if($has_second_semester) : ?>
<tr>
  <td colspan="4" style="text-align: center;"><strong><u>Second Semester <?php if(empty($sy)){}else{echo $sy;}?></u></strong></td>
</tr>
<?php foreach($student_loads as $row) :?>
<?php if($row['semester'] == 2) {?>
<tr>
<td><input type="checkbox" name="selected[]" id="selected" value="<?php echo $row['sl_id'];?>"></td>
  <td><?php echo $row['coursecode']?></td>
  <td><?php echo $row['description']?></td>
  <td><?php echo $row['units']?></td>
  <td><?php echo $row['pre_req']?></td>
</tr>
<?php }?>
<?php endforeach?>
<?php endif; ?>
<?php endif; ?>
</tbody>

<tr>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo $total_units?></td>
      <td></td>
  </tr>
</table>

</div>

</div>




<div class="row no-print">
<div class="col-xs-12">
<a href="<?=base_url()?>print_student_loads/<?= $id?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<button class="btn btn-default" id="backButton1"><i class="fa fa-arrow-left"></i> Back</button>

<!-- Add the "id" attribute to the Delete Loads button for easy reference in JavaScript -->
<button href="#" id="deleteLoads" class="btn btn-primary pull-right"><i class="fa fa-book"></i> Delete Loads</button>

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
<script>
window.onload = function() {
  // Check all checkboxes
  document.getElementById("checkAll").addEventListener("change", function() {
    var checkboxes = document.getElementsByName("selected[]");
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = this.checked;
    }
  });

  // Uncheck "Check all" if any checkbox is unchecked
  var checkboxes = document.getElementsByName("selected[]");
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener("change", function() {
      if (!this.checked) {
        document.getElementById("checkAll").checked = false;
      }
    });
  }

  // Add event listener for "deleteLoads" button
  document.getElementById("deleteLoads").addEventListener("click", function() {
    var checkboxes = document.getElementsByName("selected[]");
    var ids = [];
    var otherId = <?= $id?>;
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        ids.push(checkboxes[i].value);
      }
    }
    if (ids.length === 0) {
    alert("Please select at least one load to delete.");
    return; // Stop further execution of the function
  }
    // Perform action with the selected IDs, e.g. submit form, make AJAX request, etc.
    // Example code for submitting form using GET request
    window.location.href = "<?=base_url()?>Student_loads/delete_student_loads/" + ids.join(",")+ "?other_id=" + otherId;
    console.log(ids);
  });
}
</script>
<script>
document.getElementById('backButton').addEventListener('click', function() {
  // Use JavaScript to go back to the previous URL
  window.history.back();
 
});
document.getElementById('backButton1').addEventListener('click', function() {
  // Use JavaScript to go back to the previous URL
  window.history.back();
});

</script>
<script>
document.getElementById('backButton').addEventListener('click', function() {
  window.history.back();
});
document.getElementById('backButton1').addEventListener('click', function() {
  window.history.back();
});
</script>
</body>
</html>
