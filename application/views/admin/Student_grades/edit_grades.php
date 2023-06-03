<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  display: none;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <?php $this->load->view('admin/dashboard/layout/header');?>
  <?php $this->load->view('admin/dashboard/layout/sidebar');?>

<div class="content-wrapper">

<section class="content-header">
<h1>
<?= $title ?>
<small>#</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"  id="backButton"><i class="fa fa-dashboard"></i> Manage Student</a></li>
<li><a href="#">Subject</a></li>
<li class="active">Grades</li>
</ol>
</section>

<section class="invoice">

<?php foreach($student_data as $row) :?>
<div class="row invoice-info">
<div class="col-sm-10 invoice-col">
<address style="white-space: nowrap;">
  Name : <?= ucfirst($row['lname'])?>, <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?><br>
  Address : <?= ucfirst($row['address'])?> <?= ucfirst($row['city_municipality'])?> <?= ucfirst($row['province'])?><br>
  Course : <?= $row['cd']?><br>
  Date of Admission : <br>
  Place of Birth :  <?= ucfirst($row['birthplace'])?><br>
  Elementary  Course Completed :  <?= ucfirst($row['primary_school_last_attended'])?><br>
  High Shool Course Completed :  <?= ucfirst($row['secondary_school_last_attended'])?><br>
</address>
</div>


<div class="col-sm-2 invoice-col pull-right">
<address style="white-space: nowrap;">
  <!-- Admission Credential: Form 138-A<br> -->
  Date of Birth: <?= ucfirst($row['birthdate'])?> <br><br><br><br>
  School Year :  <?= ucfirst($row['primary_school_year_last_attended'])?><br>
  School Year :  <?= ucfirst($row['secondary_school_year_last_attended'])?><br>
</address>
</div>

</div>
<?php endforeach?>

<label for="">Edit Grade </label><br>
<div style="display: flex; align-items: center;">
  <label style="margin-right: 10px;">
    <input id="edit-switch" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
  </label>
  
  <div style="width: 110px; margin-right: 10px;">
    <select name="select" id="select" class="form-control">
      <option value="1">1st Year</option>
      <option value="2">2nd Year</option>
      <option value="3">3rd Year</option>
      <option value="4">4th Year</option>
    </select>
  </div>
</div>



<br>
<br>
<div class="row">
<div class="col-xs-12 table-responsive">
<table class="table table-striped table-bordered" style="text-align: center;">
<thead>
<tr>
<th>COURSE CODE</th>
<th>COURSE DESCRIPTION</th>
<th>UNITS</th>
<th>PRE-REQ</th>
<th>GRADES</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
</div>

</div>


<div class="row no-print">
  <div class="col-xs-12">
    <input type="hidden" name="id" value="<?=$id?>">
    <?php if(empty($student_loads)) : ?>
      <!-- <a href="<?=base_url()?>print_student_loads/<?= $id?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
      <button class="btn btn-default" id="backButton1"><i class="fa fa-arrow-left"></i> Back</button>
    <?php else : ?>
      <!-- <a href="<?=base_url()?>print_student_loads/<?= $id?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
      <button class="btn btn-default" id="backButton1"><i class="fa fa-arrow-left"></i> Back</button>
      <!-- <a href="<?=base_url()?>edit_student_loads/<?= $id?>" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i> Edit</a> -->
    <?php endif; ?>
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
document.getElementById('backButton').addEventListener('click', function() {
  window.history.back();
});
document.getElementById('backButton1').addEventListener('click', function() {
  window.history.back();
});
</script>

<!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->
<link href="<?php echo base_url()?>assets/bootstraptoggle/bootstrap-toggle.min.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/bootstraptoggle/bootstrap-toggle.min.js"></script>

<script type="text/javascript" language="javascript" >
 
$(document).ready(function(){
  $('#edit-switch').change(function() {
    var switchState = $(this).prop('checked');
    load_data(switchState);
  });
  $('#select').change(function() {
    load_data();
  });

  function load_data(edit_cells) {
  var selectedYear = $('#select').val();
  $.ajax({
    url:"<?php echo base_url(); ?>Student_grades/load_data",
    dataType:"JSON",
    data: {id: <?=$id?>,year: selectedYear},
    success:function(data){
      var html = '';
      var isFirstSemester = true;
      if(data == null || data == ''){
          html += '<tr><td colspan="5" style="text-align: center; margin-right:100px;"><strong><u>No Subject/s</u></strong></td></tr>';
        }else {
        $.each(data, function(key, value) {
          
          if (value.semester == 1 && isFirstSemester) {
            if (value.year_level === '1') {
              html += '<tr><td colspan="5" style="text-align: center; margin-right:100px;"><strong><u>First Year</u></strong></td></tr>';
            } else if (value.year_level === '2') {
              html += '<tr><td colspan="5" style="text-align: center; margin-right:100px;"><strong><u>Second Year</u></strong></td></tr>';
            }else if (value.year_level === '3') {
              html += '<tr><td colspan="5" style="text-align: center; margin-right:100px;"><strong><u>Third Year</u></strong></td></tr>';
            }else if (value.year_level === '4') {
              html += '<tr><td colspan="5" style="text-align: center; margin-right:100px;"><strong><u>Fourth Year</u></strong></td></tr>';
            }

            html += '<tr><td colspan="5" style="text-align: center; margin-right:100px;"><strong><u>1st Sem</u></strong></td></tr>';
              isFirstSemester = false;
          }
          if (value.semester == 2 && !isFirstSemester) {
            html += '<tr><td colspan="5" style="text-align: center;"><strong><u>2nd Sem</u></strong></td></tr>';
              isFirstSemester = true;
          }
          html += '<tr>';
          html += '<td class="table_data" data-row_id="'+value.sl_id+'" data-column_name="coursecode">'+value.coursecode+'</td>';
          html += '<td class="table_data" data-row_id="'+value.sl_id+'" data-column_name="description">'+value.description+'</td>';
          html += '<td class="table_data" data-row_id="'+value.sl_id+'" data-column_name="units">'+value.units+'</td>';
          html += '<td class="table_data" data-row_id="'+value.sl_id+'" data-column_name="pre_req">'+value.pre_req+'</td>';
          if (edit_cells) {
            html += '<td class="table_data" data-row_id="'+value.sl_id+'" data-column_name="grade" contenteditable>'+value.grade+'</td>';
          } else {
            html += '<td class="table_data" data-row_id="'+value.sl_id+'" data-column_name="grade">'+value.grade+'</td>';
          }
          html += '</tr>';
        });
      }
      $('tbody').html(html);
    }
  });
}


  load_data();

 

  $(document).on('blur', '.table_data', function(){
    var id = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>Grades/update",
      method:"POST",
      data:{id:id, table_column:table_column, value:value},
      success:function(data)
      {
        var stat = 'Updated';
        success(stat);
        load_data(true);
      }
    })
  });

  
});
</script>
<?php $this->load->view('helpers/toastr');?>
</body>
</html>
