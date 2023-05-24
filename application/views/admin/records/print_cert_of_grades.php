<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<style>
.table {
    text-align: center;
    border: 0;
}
.table td, th {
  text-align: center;
  padding:0px,0px,0px,0px;
}

.table tr:last-child td {
  border-bottom: 1px solid black;
}
.table tr.spaceUnder>td {
  margin:0; padding:0;
}
.table tr.spacing>th {
  margin:0; padding:0;
}

</style>
<link rel="stylesheet" href="<?=base_url()?>assets/record/print.css" media="print">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<body>


<section class="invoice">

<button class="btn btn-primary pull-right" onclick="window.print();" id="backButton"><i class="fa fa-print"></i> Print</button>

<div class="row" style="margin-top: 5px; margin-bottom: 5px;">
  <div class="col-xs-12 text-center">
    <div class="d-flex justify-content-center align-items-center">
      <div style="position: absolute; left: 10%; top: 0;">
        <img src="<?= base_url()?>assets/img/PCC.png" alt="" style="width:85px; height:85px;">
      </div>
      <div style="margin-left: auto; margin-right: auto;">
        <h3 style="margin-top: 5px; margin-bottom: 5px;">
          <b>POLA COMMUNITY COLLEGE</b>
        </h3>
      </div>
    </div>
    <h5 style="margin-top: 5px; margin-bottom: 5px;"><b>Zone II, Pola Oriental Mindoro</b></h5>
    <h6 style="margin-top: 5px; margin-bottom: 5px;"><b>Phone: +(63)9560875992 | E-mail: polacommunitycollege2020@gmail.com</b></h6>
    <hr style="margin-top: 15px; margin-bottom: 2px;">
    <hr style="margin-top: 2px; margin-bottom: 2px;">
    <h4 style="color:#907358;"><b>OFFICE OF THE REGISTRAR</b></h4>
    <h4><b>CERTIFICATION OF GRADES</b></h4>
  </div>
</div>


<?php foreach($student_data as $row) :?>
<div class="row invoice-info">
<div class="col-sm-10 invoice-col">
<address style="white-space: nowrap;">
  Name : <?= ucfirst($row['lname'])?>, <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?><br>
  Address : <?= ucfirst($row['address'])?> <?= ucfirst($row['city_municipality'])?> <?= ucfirst($row['province'])?><br>
  Course : <?php if($row['program'] == 'BSE') {echo 'Bachelor of Science in Entrepreneurship';}elseif($row['program'] == 'BPA'){echo 'Bachelor of Public Administration';}?><br>
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

<label for="" id="filterlabel">Filter Grade </label><br>
<div style="display: flex; align-items: center;">
<div style="width: 110px; margin-right: 10px;">
    <select name="select" id="select" class="form-control">
      <option value="1">1st Year</option>
      <option value="2">2nd Year</option>
      <option value="3">3rd Year</option>
      <option value="4">4th Year</option>
    </select>
  </div>
  
  <div style="width: 135px; margin-right: 10px;">
    <select name="selectsem" id="selectsem" class="form-control">
    <option value="all">All Semester</option>
      <option value="1">1st Semester</option>
      <option value="2">2nd Semester</option>
    </select>
  </div>
</div>



<br>
<br>
<div class="row">
<div class="col-xs-12 table-responsive">
<table class="table" style="text-align: center;">
<thead>
<tr class="spacing">
<th style="border: 1px solid black;">COURSE CODE</th>
<th style="border: 1px solid black;">COURSE DESCRIPTION</th>
<th style="border: 1px solid black;">CREDITS</th>
<th style="border: 1px solid black;">CREDIT</th>
<th style="border: 1px solid black;">REMARKS</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
<?php foreach($student_data as $row) :?>
<div class="col-sm-12">
  <p style="text-align: justify;">This certification is being issued to <?php if($row['sex'] == 'Male'){echo 'Mr.';}else{echo 'Ms.';}?> <?= ucfirst($row['lname'])?> this <?php ?>
  for whatever legal purpose this may serve.
  </p>
</div>
<?php endforeach?>

<div style="text-align:left; margin-top:20px;">
    Not valid without school seal
</div>

<div style="text-align:right; margin-top:60px;margin-right:60px;">
<?php foreach($signatory as $row) :?>
    <?php echo strtoupper($row['fullname'])?> <br>
    <?php echo ucfirst($row['position'])?> <br>
<?php endforeach?>
</div>
</div>

</div>


</section>





<?php $this->load->view('admin/user/scripts/footer');?>



<link href="<?php echo base_url()?>assets/bootstraptoggle/bootstrap-toggle.min.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/bootstraptoggle/bootstrap-toggle.min.js"></script>

<script type="text/javascript" language="javascript" >
 
$(document).ready(function(){
  
  $('#select').change(function() {
    load_data();
  });
  $('#selectsem').change(function() {
    load_data();
  });

  function load_data() {
  var selectedYear = $('#select').val();
  var selectedSem = $('#selectsem').val();
  $.ajax({
    url: "<?php echo base_url(); ?>Records/load_data",
    dataType: "JSON",
    data: { id: <?=$id?>, year: selectedYear, sem: selectedSem },
    success: function(data) {
      var html = '';
      var isFirstSemester = true;
      var isSecondSemesterShown = false;
      var ay = '';
      if (data == null || data == '') {
        html += '<tr><td colspan="5" style="text-align: center; margin-right:100px;"><strong><u>No Subject/s</u></strong></td></tr>';
      } else {
        if (selectedSem == "2") {
          html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>Second Sem</u></strong></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
          isSecondSemesterShown = true; // Set the flag to true after showing the second semester label row
        }
        $.each(data, function(key, value) {
          if ((selectedSem == "1" && value.semester == 1) || (selectedSem == "2" && value.semester == 2) || selectedSem == "all") {
            if (value.semester == 1 && isFirstSemester) {
              // if (value.year_level === '1') {
              //   html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>First Year</u></strong></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
              // } else if (value.year_level === '2') {
              //   html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>Second Year</u></strong></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
              // } else if (value.year_level === '3') {
              //   html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>Third Year</u></strong></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
              // } else if (value.year_level === '4') {
              //   html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>Fourth Year</u></strong></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
              // }

              html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>First Sem '+ value.school_year +'</u></strong></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
              isFirstSemester = false;
            }
            if (value.semester == 2 && !isFirstSemester && !isSecondSemesterShown) {
              html += '<tr class="spaceUnder"><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><strong><u>Second Sem '+ value.school_year +'</u></strong></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
              isFirstSemester = true;
              isSecondSemesterShown = true; // Set the flag to true after showing the second semester label row
              var ay = value.school_year;
            }
            html += '<tr class="spaceUnder">';
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="coursecode" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + value.coursecode + '</td>';
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="description" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + value.description + '</td>';
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="units" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + value.units + '</td>';
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="pre_req" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + value.pre_req + '</td>';
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="grade" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + value.grade + '</td>';
            html += '</tr>';
          }
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
