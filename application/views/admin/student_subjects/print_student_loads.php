
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php $this->load->view('admin/user/layout/head');?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
/* Print-specific style */
@media print {
  #backButton {
    display: none !important; 
  }
  ::-webkit-scrollbar {
        display: none;
    }
}
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
#label1 {
    print-color-adjust: exact !important; 
    color-adjust: exact !important; 
    color-adjust:exact !important; 
    color:#925b27 !important; 
   }
  body{
    font-size: 18px;
    font-style: justify;
  }
  @media print {
    @page {
      font-size: 18px;
      margin:  0.5in; 
    }
   }
</style>
<body onload="window.print();">

<div class="wrapper">

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
    Course : <?php if($row['program'] == 'BSE') {echo 'Bachelor of Science in Entrepreneurship';}else{echo 'Bachelor of Public Administration';}?><br>
    Date of Admission : <br>
    Place of Birth :  <?= ucfirst($row['birthplace'])?><br>
    Elementary Course Completed :  <?= ucfirst($row['primary_school_last_attended'])?><br>
    High School Course Completed :  <?= ucfirst($row['secondary_junior_school_last_attended'])?><br>
  </address>
</div>


<div class="col-sm-2 invoice-col pull-right">
    <address style="white-space: nowrap;">
        Admission Credential: Form 138-A<br>
        Date of Birth: <?= ucfirst($row['birthdate'])?> <br><br><br><br>
        School Year :  <?= ucfirst($row['primary_school_year_last_attended'])?><br>
        School Year :  <?= ucfirst($row['secondary_junior_school_year_last_attended'])?><br>
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
<table class="table">
<thead>
<tr class="spacing">
<th style="border: 1px solid black;text-align: center;">COURSE CODE</th>
<th style="border: 1px solid black;text-align: center;">COURSE DESCRIPTION</th>
<th style="border: 1px solid black;text-align: center;">UNITS</th>
<th style="border: 1px solid black;text-align: center;">PRE-REQ</th>
</tr>
</thead>
<tbody>
<?php if(empty($student_loads)) : ?>
<tr>
<td colspan="4" style="text-align: center;">No Matching Records</td>
</tr>
<?php else : ?>
  <tr class="spaceUnder">
    <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
    <td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>First Sem <?= $sy?></u></strong></td>
    <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
    <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
    <td style="border-left: 1px solid black;border-right: hidden;"></td>
  </tr>
<?php foreach($student_loads as $row) :?>
<?php if($row['semester'] == 1) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['pre_req']?></td>
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
<tr class="spaceUnder">
    <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;"></td>
    <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;"><strong><u>First Sem <?php if(empty($sy)){}else{echo $sy;}?></u></strong></td>
    <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;"></td>
    <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;"></td>
    <td style="border-left: 1px solid black;border-right: hidden;border-top: 1px solid black;"></td>
  </tr>
<?php foreach($student_loads as $row) :?>
<?php if($row['semester'] == 2) {?>
  <tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['pre_req']?></td>
</tr>
<?php }?>
<?php endforeach?>
<?php endif; ?>
<?php endif; ?>
</tbody>
  <tr class="spaceUnder">
      <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: 1px solid black;"></td>
      <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: 1px solid black;">TOTAL UNITS</td>
      <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: 1px solid black;"><?php echo $total_units?></td> <!-- Display the total sum of units -->
      <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: 1px solid black;"></td>
  </tr>
  </tfoot>
</table>


<div style="text-align:left; margin-top:20px;">
   <strong>NOT VALID WITHOUT SEAL</strong>
</div>
<div style="text-align:right; margin-top:60px;margin-right:60px;">
<?php foreach($signatory as $row) :?>
  <p style="font-weight: 900;margin-bottom:0px;"><u><?php echo strtoupper($row['fullname'])?></u></p>
    <p style="margin-right:30px;margin-top:0px;"><?php echo ucfirst($row['position'])?> </p><br>
<?php endforeach?>
</div>
</div>

</div>
</section>

</div>

</body>
</html>
