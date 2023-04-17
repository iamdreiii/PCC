
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php $this->load->view('admin/user/layout/head');?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script nonce="3d834fa7-28d1-4d4e-8237-9f10ec8d35b3">(function(w,d){!function(bv,bw,bx,by){bv[bx]=bv[bx]||{};bv[bx].executed=[];bv.zaraz={deferred:[],listeners:[]};bv.zaraz.q=[];bv.zaraz._f=function(bz){return function(){var bA=Array.prototype.slice.call(arguments);bv.zaraz.q.push({m:bz,a:bA})}};for(const bB of["track","set","debug"])bv.zaraz[bB]=bv.zaraz._f(bB);bv.zaraz.init=()=>{var bC=bw.getElementsByTagName(by)[0],bD=bw.createElement(by),bE=bw.getElementsByTagName("title")[0];bE&&(bv[bx].t=bw.getElementsByTagName("title")[0].text);bv[bx].x=Math.random();bv[bx].w=bv.screen.width;bv[bx].h=bv.screen.height;bv[bx].j=bv.innerHeight;bv[bx].e=bv.innerWidth;bv[bx].l=bv.location.href;bv[bx].r=bw.referrer;bv[bx].k=bv.screen.colorDepth;bv[bx].n=bw.characterSet;bv[bx].o=(new Date).getTimezoneOffset();if(bv.dataLayer)for(const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ,bK)=>({...bJ[1],...bK[1]})))))zaraz.set(bI[0],bI[1],{scope:"page"});bv[bx].q=[];for(;bv.zaraz.q.length;){const bL=bv.zaraz.q.shift();bv[bx].q.push(bL)}bD.defer=!0;for(const bM of[localStorage,sessionStorage])Object.keys(bM||{}).filter((bO=>bO.startsWith("_zaraz_"))).forEach((bN=>{try{bv[bx]["z_"+bN.slice(7)]=JSON.parse(bM.getItem(bN))}catch{bv[bx]["z_"+bN.slice(7)]=bM.getItem(bN)}}));bD.referrerPolicy="origin";bD.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bv[bx])));bC.parentNode.insertBefore(bD,bC)};["complete","interactive"].includes(bw.readyState)?zaraz.init():bv.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<style>
/* Print-specific style */
@media print {
  #backButton {
    display: none !important; /* Hide the button when printing */
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
    High School Course Completed :  <?= ucfirst($row['secondary_school_last_attended'])?><br>
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
<style>
  table {
    border-collapse: collapse;
  }

  th, td {
    padding: 0;
    border: none;
  }
</style>

<?php
$total_units = 0; // Initialize total units to 0
foreach($student_loads as $row) {
    $total_units += $row['units']; // Add the units of each row to the total units
}
?>
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>COURSE CODE</th>
<th>COURSE DESCRIPTION</th>
<th>UNITS</th>
<th>PRE-REQ</th>
</tr>
</thead>
<tbody>
<?php if(empty($student_loads)) : ?>
<tr>
<td colspan="4" style="text-align: center;">No Matching Records</td>
</tr>
<?php else : ?>
<tr>
  <td colspan="4" style="text-align: center;"><strong><u>First Semester : <?= $sy?></u></strong></td>
</tr>
<?php foreach($student_loads as $row) :?>
<?php if($row['semester'] == 1) {?>
<tr>
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
      <td><?php echo $total_units?></td> <!-- Display the total sum of units -->
      <td></td>
  </tr>
  </tfoot>
</table>


<div style="text-align:left; margin-top:20px;">
    Not valid without school seal
</div>
<div style="text-align:right; margin-top:60px;margin-right:60px;">
    Name of Registrar <br>
    College Registrar
</div>
</div>

</div>
</section>

</div>

</body>
</html>
