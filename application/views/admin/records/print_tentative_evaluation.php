
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php $this->load->view('admin/user/layout/head');?>
<link rel="stylesheet" href="<?=base_url()?>assets/record/print.css" media="print">
<style>
.table {
    text-align: center;
    border: 0;
}
.table td, th {
  text-align: center;
  padding:0px,0px,0px,0px;
}
.table td {
  text-align: center;
  padding: 0;
  border-left: 1px solid black; /* Add this line */
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- <script nonce="3d834fa7-28d1-4d4e-8237-9f10ec8d35b3">(function(w,d){!function(bv,bw,bx,by){bv[bx]=bv[bx]||{};bv[bx].executed=[];bv.zaraz={deferred:[],listeners:[]};bv.zaraz.q=[];bv.zaraz._f=function(bz){return function(){var bA=Array.prototype.slice.call(arguments);bv.zaraz.q.push({m:bz,a:bA})}};for(const bB of["track","set","debug"])bv.zaraz[bB]=bv.zaraz._f(bB);bv.zaraz.init=()=>{var bC=bw.getElementsByTagName(by)[0],bD=bw.createElement(by),bE=bw.getElementsByTagName("title")[0];bE&&(bv[bx].t=bw.getElementsByTagName("title")[0].text);bv[bx].x=Math.random();bv[bx].w=bv.screen.width;bv[bx].h=bv.screen.height;bv[bx].j=bv.innerHeight;bv[bx].e=bv.innerWidth;bv[bx].l=bv.location.href;bv[bx].r=bw.referrer;bv[bx].k=bv.screen.colorDepth;bv[bx].n=bw.characterSet;bv[bx].o=(new Date).getTimezoneOffset();if(bv.dataLayer)for(const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ,bK)=>({...bJ[1],...bK[1]})))))zaraz.set(bI[0],bI[1],{scope:"page"});bv[bx].q=[];for(;bv.zaraz.q.length;){const bL=bv.zaraz.q.shift();bv[bx].q.push(bL)}bD.defer=!0;for(const bM of[localStorage,sessionStorage])Object.keys(bM||{}).filter((bO=>bO.startsWith("_zaraz_"))).forEach((bN=>{try{bv[bx]["z_"+bN.slice(7)]=JSON.parse(bM.getItem(bN))}catch{bv[bx]["z_"+bN.slice(7)]=bM.getItem(bN)}}));bD.referrerPolicy="origin";bD.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bv[bx])));bC.parentNode.insertBefore(bD,bC)};["complete","interactive"].includes(bw.readyState)?zaraz.init():bv.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script> -->
</head>

<body >
<!-- onload="window.print();" -->

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
    <h4 style="margin-top: 5px; margin-bottom: 5px;">
          <b><?php foreach($student_data as $row) {if($row['program'] == 'BSE'){echo 'BACHELOR OF SCIENCE IN ENTREPRENEURSHIP';}elseif($row['program'] == 'BPA'){echo 'BACHELOR OF PUBLIC ADMINISTRATION';}}?></b>
        </h4>
    <h4><b>TENTATIVE EVALUATION</b></h4>
    <h4><b>A.Y. <?php foreach($sy as $row) {if($row['status'] == 'active'){echo $row['school_year'];}}?></b></h4>
  </div>
</div>

<?php foreach($student_data as $row) :?>
<div class="row col-sm-12 invoice-info">
<div class="col-sm-10 invoice-col">
  <address style="white-space: nowrap;">
    <strong><?= ucfirst($row['lname'])?>, <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?></strong>
  </address>
</div>


</div>
<?php endforeach?>



<div class="container col-sm-12">
<!-----------------------------------------------------------------2ND--------------------------------------------------------------------------------->

<?php if(empty($first_student_loads)) : ?>
<tr>
<!-- <td colspan="4" style="text-align: center;">No Matching Records</td> -->
</tr>
<?php else : ?>
<?php
$total_units1_1 = 0;
$total_units1_2 = 0;

foreach ($first_student_loads as $count) {
    if ($count['semester'] == 1) {
        $total_units1_1 += $count['units'];
    } elseif ($count['semester'] == 2) {
        $total_units1_2 += $count['units'];
    }
}

?>
<table class="table">
<center><h4 ><strong>First Year</strong></h4></center>
<thead>
<tr class="spacing">
<th style="border: 1px solid black;">COURSE CODE</th>
<th style="border: 1px solid black;">COURSE DESCRIPTION</th>
<th style="border: 1px solid black;">UNITS</th>
<th style="border: 1px solid black;">PRE-REQ</th>
<th style="border: 1px solid black;">GRADES</th>
</tr>
</thead>
<tbody>

<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>First Semester : <?= $firstsy?></u></strong></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
</tr>
<?php foreach($first_student_loads as $row) :?>
<?php if($row['semester'] == 1) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo strtoupper($row['pre_req'])?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">
  <?php
   if($row['grade'] >= 98 && $row['grade'] <= 100)
    {
      echo '1.0';
    }elseif($row['grade'] >= 95 && $row['grade'] <= 97)
    {
      echo '1.25';
    }elseif($row['grade'] >= 92 && $row['grade'] <= 94)
    {
      echo '1.5';
    }elseif($row['grade'] >= 89 && $row['grade'] <= 91)
    {
      echo '1.75';
    }elseif($row['grade'] >= 86 && $row['grade'] <= 88)
    {
      echo '2.0';
    }elseif($row['grade'] >= 83 && $row['grade'] <= 85)
    {
      echo '2.25';
    }elseif($row['grade'] >= 80 && $row['grade'] <= 82)
    {
      echo '2.5';
    }elseif($row['grade'] >= 77 && $row['grade'] <= 79)
    {
      echo '2.75';
    }elseif($row['grade'] >= 75 && $row['grade'] <= 76)
    {
      echo '3.0';
    }elseif($row['grade'] < 75 && $row['grade'] >= 1)
    {
      echo '5';
    }elseif(empty($row['grade']) || $row['grade'] == 0.00 || $row['grade'] == NULL)
    {
      echo $row['grade'];
    }
  ?></td>
</tr>
<?php }?>
<?php endforeach?>
<tr>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"><?php if(empty($total_units1_1)){}else{echo $total_units1_1;}?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: hidden;border-right: hidden;border-top: solid black 1px;"></td>
</tr>

<?php 
$has_second_semester1 = false;
foreach($first_student_loads as $row) {
  if($row['semester'] == 2) {
    $has_second_semester1 = true;
    break;
  }
}
if($has_second_semester1) : ?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"><strong><u>Second Semester <?php if(empty($firstsy)){}else{echo $firstsy;}?></u></strong></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
</tr>
<?php foreach($first_student_loads as $row) :?>
<?php if($row['semester'] == 2) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo strtoupper($row['pre_req'])?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">
  <?php
   if($row['grade'] >= 98 && $row['grade'] <= 100)
    {
      echo '1.0';
    }elseif($row['grade'] >= 95 && $row['grade'] <= 97)
    {
      echo '1.25';
    }elseif($row['grade'] >= 92 && $row['grade'] <= 94)
    {
      echo '1.5';
    }elseif($row['grade'] >= 89 && $row['grade'] <= 91)
    {
      echo '1.75';
    }elseif($row['grade'] >= 86 && $row['grade'] <= 88)
    {
      echo '2.0';
    }elseif($row['grade'] >= 83 && $row['grade'] <= 85)
    {
      echo '2.25';
    }elseif($row['grade'] >= 80 && $row['grade'] <= 82)
    {
      echo '2.5';
    }elseif($row['grade'] >= 77 && $row['grade'] <= 79)
    {
      echo '2.75';
    }elseif($row['grade'] >= 75 && $row['grade'] <= 76)
    {
      echo '3.0';
    }elseif($row['grade'] < 75 && $row['grade'] >= 1)
    {
      echo '5';
    }elseif(empty($row['grade']) || $row['grade'] == 0.00 || $row['grade'] == NULL)
    {
      echo $row['grade'];
    }
  ?></td>
</tr>
<?php }?>
<?php endforeach?>
<?php endif; ?>
<?php endif; ?>
</tbody>
<tfoot>
<tr>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px; border-bottom:hidden;"></td>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;border-bottom:hidden;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"><?php if(empty($total_units1_2)){}else{echo $total_units1_2;}?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;border-bottom:hidden;"></td>
  <td style="border-left: hidden;border-right: hidden;border-top: solid black 1px;border-bottom:hidden;"></td>
</tr>
</tfoot>
</table>

<!-----------------------------------------------------------------2ND--------------------------------------------------------------------------------->

<?php if(empty($second_student_loads)) : ?>
<tr>
<!-- <td colspan="4" style="text-align: center;">No Matching Records</td> -->
</tr>
<?php else : ?>
<?php
$total_units2_1 = 0;
$total_units2_2 = 0;
foreach ($second_student_loads as $count) {
    if ($count['semester'] == 1) {
        $total_units2_1 += $count['units'];
    } elseif ($count['semester'] == 2) {
        $total_units2_2 += $count['units'];
    }
}
?>
<table class="table" >
<center><h4 ><strong>Second Year</strong></h4></center>
<thead>
<tr class="spacing">
<th style="border: 1px solid black;">COURSE CODE</th>
<th style="border: 1px solid black;">COURSE DESCRIPTION</th>
<th style="border: 1px solid black;">UNITS</th>
<th style="border: 1px solid black;">PRE-REQ</th>
<th style="border: 1px solid black;">GRADES</th>
</tr>
</thead>
<tbody>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>First Semester : <?= $secondsy?></u></strong></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
</tr>
<?php foreach($second_student_loads as $row) :?>
<?php if($row['semester'] == 1) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo strtoupper($row['pre_req'])?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">
  <?php
   if($row['grade'] >= 98 && $row['grade'] <= 100)
    {
      echo '1.0';
    }elseif($row['grade'] >= 95 && $row['grade'] <= 97)
    {
      echo '1.25';
    }elseif($row['grade'] >= 92 && $row['grade'] <= 94)
    {
      echo '1.5';
    }elseif($row['grade'] >= 89 && $row['grade'] <= 91)
    {
      echo '1.75';
    }elseif($row['grade'] >= 86 && $row['grade'] <= 88)
    {
      echo '2.0';
    }elseif($row['grade'] >= 83 && $row['grade'] <= 85)
    {
      echo '2.25';
    }elseif($row['grade'] >= 80 && $row['grade'] <= 82)
    {
      echo '2.5';
    }elseif($row['grade'] >= 77 && $row['grade'] <= 79)
    {
      echo '2.75';
    }elseif($row['grade'] >= 75 && $row['grade'] <= 76)
    {
      echo '3.0';
    }elseif($row['grade'] < 75 && $row['grade'] >= 1)
    {
      echo '5';
    }elseif(empty($row['grade']) || $row['grade'] == 0.00 || $row['grade'] == NULL)
    {
      echo $row['grade'];
    }
  ?></td>
</tr>
<?php }?>
<?php endforeach?>
<tr>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"><?php if(empty($total_units2_1)){}else{echo $total_units2_1;}?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: hidden;border-right: hidden;border-top: solid black 1px;"></td>
</tr>
<?php 
$has_second_semester2 = false;
foreach($second_student_loads as $row) {
  if($row['semester'] == 2) {
    $has_second_semester2 = true;
    break;
  }
}
if($has_second_semester2) : ?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"><strong><u>Second Semester <?php if(empty($secondsy)){}else{echo $secondsy;}?></u></strong></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
</tr>
<?php foreach($second_student_loads as $row) :?>
<?php if($row['semester'] == 2) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo strtoupper($row['pre_req'])?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">
  <?php
   if($row['grade'] >= 98 && $row['grade'] <= 100)
    {
      echo '1.0';
    }elseif($row['grade'] >= 95 && $row['grade'] <= 97)
    {
      echo '1.25';
    }elseif($row['grade'] >= 92 && $row['grade'] <= 94)
    {
      echo '1.5';
    }elseif($row['grade'] >= 89 && $row['grade'] <= 91)
    {
      echo '1.75';
    }elseif($row['grade'] >= 86 && $row['grade'] <= 88)
    {
      echo '2.0';
    }elseif($row['grade'] >= 83 && $row['grade'] <= 85)
    {
      echo '2.25';
    }elseif($row['grade'] >= 80 && $row['grade'] <= 82)
    {
      echo '2.5';
    }elseif($row['grade'] >= 77 && $row['grade'] <= 79)
    {
      echo '2.75';
    }elseif($row['grade'] >= 75 && $row['grade'] <= 76)
    {
      echo '3.0';
    }elseif($row['grade'] < 75 && $row['grade'] >= 1)
    {
      echo '5';
    }elseif(empty($row['grade']) || $row['grade'] == 0.00 || $row['grade'] == NULL)
    {
      echo $row['grade'];
    }
  ?></td>
</tr>
<?php }?>
<?php endforeach?>
<?php endif; ?>
<?php endif; ?>
</tbody>
<tfoot>
<tr>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px; border-bottom:hidden;"></td>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;border-bottom:hidden;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"><?php if(empty($total_units2_2)){}else{echo $total_units2_2;}?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;border-bottom:hidden;"></td>
  <td style="border-left: hidden;border-right: hidden;border-top: solid black 1px;border-bottom:hidden;"></td>
</tr>
</tfoot>
</table>

<!--------------------------------------------------------------------3RD------------------------------------------------------------------------------>

<?php if(empty($third_student_loads)) : ?>
<tr>
<!-- <td colspan="4" style="text-align: center;">No Matching Records</td> -->
</tr>
<?php else : ?>
<?php
$total_units3_1 = 0;
$total_units3_2 = 0;
foreach ($third_student_loads as $count) {
    if ($count['semester'] == 1) {
        $total_units3_1 += $count['units'];
    } elseif ($count['semester'] == 2) {
        $total_units3_2 += $count['units'];
    }
}
?>
<table class="table" >
<center><h4 ><strong>Third Year</strong></h4></center>
<thead>
<tr class="spacing">
<th style="border: 1px solid black;">COURSE CODE</th>
<th style="border: 1px solid black;">COURSE DESCRIPTION</th>
<th style="border: 1px solid black;">UNITS</th>
<th style="border: 1px solid black;">PRE-REQ</th>
<th style="border: 1px solid black;">GRADES</th>
</tr>
</thead>
<tbody>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>First Semester : <?= $thirdsy?></u></strong></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
</tr>
<?php foreach($third_student_loads as $row) :?>
<?php if($row['semester'] == 1) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo strtoupper($row['pre_req'])?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">
  <?php
   if($row['grade'] >= 98 && $row['grade'] <= 100)
    {
      echo '1.0';
    }elseif($row['grade'] >= 95 && $row['grade'] <= 97)
    {
      echo '1.25';
    }elseif($row['grade'] >= 92 && $row['grade'] <= 94)
    {
      echo '1.5';
    }elseif($row['grade'] >= 89 && $row['grade'] <= 91)
    {
      echo '1.75';
    }elseif($row['grade'] >= 86 && $row['grade'] <= 88)
    {
      echo '2.0';
    }elseif($row['grade'] >= 83 && $row['grade'] <= 85)
    {
      echo '2.25';
    }elseif($row['grade'] >= 80 && $row['grade'] <= 82)
    {
      echo '2.5';
    }elseif($row['grade'] >= 77 && $row['grade'] <= 79)
    {
      echo '2.75';
    }elseif($row['grade'] >= 75 && $row['grade'] <= 76)
    {
      echo '3.0';
    }elseif($row['grade'] < 75 && $row['grade'] >= 1)
    {
      echo '5';
    }elseif(empty($row['grade']) || $row['grade'] == 0.00 || $row['grade'] == NULL)
    {
      echo $row['grade'];
    }
  ?></td>
</tr>
<?php }?>
<?php endforeach?>
<tr>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"><?php if(empty($total_units3_1)){}else{echo $total_units3_1;}?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: hidden;border-right: hidden;border-top: solid black 1px;"></td>
</tr>
<?php 
$has_second_semester3 = false;
foreach($third_student_loads as $row) {
  if($row['semester'] == 2) {
    $has_second_semester3 = true;
    break;
  }
}
if($has_second_semester3) : ?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"><strong><u>Second Semester <?php if(empty($thirdsy)){}else{echo $thirdsy;}?></u></strong></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
</tr>
<?php foreach($third_student_loads as $row) :?>
<?php if($row['semester'] == 2) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo strtoupper($row['pre_req'])?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">
  <?php
   if($row['grade'] >= 98 && $row['grade'] <= 100)
    {
      echo '1.0';
    }elseif($row['grade'] >= 95 && $row['grade'] <= 97)
    {
      echo '1.25';
    }elseif($row['grade'] >= 92 && $row['grade'] <= 94)
    {
      echo '1.5';
    }elseif($row['grade'] >= 89 && $row['grade'] <= 91)
    {
      echo '1.75';
    }elseif($row['grade'] >= 86 && $row['grade'] <= 88)
    {
      echo '2.0';
    }elseif($row['grade'] >= 83 && $row['grade'] <= 85)
    {
      echo '2.25';
    }elseif($row['grade'] >= 80 && $row['grade'] <= 82)
    {
      echo '2.5';
    }elseif($row['grade'] >= 77 && $row['grade'] <= 79)
    {
      echo '2.75';
    }elseif($row['grade'] >= 75 && $row['grade'] <= 76)
    {
      echo '3.0';
    }elseif($row['grade'] < 75 && $row['grade'] >= 1)
    {
      echo '5';
    }elseif(empty($row['grade']) || $row['grade'] == 0.00 || $row['grade'] == NULL)
    {
      echo $row['grade'];
    }
  ?></td>
</tr>
<?php }?>
<?php endforeach?>
<?php endif; ?>
<?php endif; ?>
</tbody>
<tfoot>
<tr>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px; border-bottom:hidden;"></td>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;border-bottom:hidden;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"><?php if(empty($total_units3_2)){}else{echo $total_units3_2;}?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;border-bottom:hidden;"></td>
  <td style="border-left: hidden;border-right: hidden;border-top: solid black 1px;border-bottom:hidden;"></td>
</tr>
</tfoot>
</table>

<!----------------------------------------------------------------------4TH---------------------------------------------------------------------------->

<?php if(empty($fourth_student_loads)) : ?>
<tr>
<!-- <td colspan="4" style="text-align: center;">No Matching Records</td> -->
</tr>
<?php else : ?>
<?php
$total_units4_1 = 0;
$total_units4_2 = 0;
foreach ($fourth_student_loads as $count) {
    if ($count['semester'] == 1) {
        $total_units4_1 += $count['units'];
    } elseif ($count['semester'] == 2) {
        $total_units4_2 += $count['units'];
    }
}
?>
<table class="table" >
<center><h4 ><strong>Fourth Year</strong></h4></center>
<thead>
<tr class="spacing">
<th style="border: 1px solid black;">COURSE CODE</th>
<th style="border: 1px solid black;">COURSE DESCRIPTION</th>
<th style="border: 1px solid black;">UNITS</th>
<th style="border: 1px solid black;">PRE-REQ</th>
<th style="border: 1px solid black;">GRADES</th>
</tr>
</thead>
<tbody>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>First Semester : <?= $fourthsy?></u></strong></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;"></td>
</tr>
<?php foreach($fourth_student_loads as $row) :?>
<?php if($row['semester'] == 1) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo strtoupper($row['pre_req'])?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">
  <?php
   if($row['grade'] >= 98 && $row['grade'] <= 100)
    {
      echo '1.0';
    }elseif($row['grade'] >= 95 && $row['grade'] <= 97)
    {
      echo '1.25';
    }elseif($row['grade'] >= 92 && $row['grade'] <= 94)
    {
      echo '1.5';
    }elseif($row['grade'] >= 89 && $row['grade'] <= 91)
    {
      echo '1.75';
    }elseif($row['grade'] >= 86 && $row['grade'] <= 88)
    {
      echo '2.0';
    }elseif($row['grade'] >= 83 && $row['grade'] <= 85)
    {
      echo '2.25';
    }elseif($row['grade'] >= 80 && $row['grade'] <= 82)
    {
      echo '2.5';
    }elseif($row['grade'] >= 77 && $row['grade'] <= 79)
    {
      echo '2.75';
    }elseif($row['grade'] >= 75 && $row['grade'] <= 76)
    {
      echo '3.0';
    }elseif($row['grade'] < 75 && $row['grade'] >= 1)
    {
      echo '5';
    }elseif(empty($row['grade']) || $row['grade'] == 0.00 || $row['grade'] == NULL)
    {
      echo $row['grade'];
    }
  ?></td>
</tr>
<?php }?>
<?php endforeach?>
<tr>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"><?php if(empty($total_units4_1)){}else{echo $total_units4_1;}?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"></td>
  <td style="border-left: hidden;border-right: hidden;border-top: solid black 1px;"></td>
</tr>
<?php 
$has_second_semester4 = false;
foreach($fourth_student_loads as $row) {
  if($row['semester'] == 2) {
    $has_second_semester4 = true;
    break;
  }
}
if($has_second_semester4) : ?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"><strong><u>Second Semester <?php if(empty($fourthsy)){}else{echo $fourthsy;}?></u></strong></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black; border-top:1px solid black;"></td>
</tr>
<?php foreach($fourth_student_loads as $row) :?>
<?php if($row['semester'] == 2) {?>
<tr class="spaceUnder">
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['coursecode']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['description']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo $row['units']?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;"><?php echo strtoupper($row['pre_req'])?></td>
  <td style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">
  <?php
   if($row['grade'] >= 98 && $row['grade'] <= 100)
    {
      echo '1.0';
    }elseif($row['grade'] >= 95 && $row['grade'] <= 97)
    {
      echo '1.25';
    }elseif($row['grade'] >= 92 && $row['grade'] <= 94)
    {
      echo '1.5';
    }elseif($row['grade'] >= 89 && $row['grade'] <= 91)
    {
      echo '1.75';
    }elseif($row['grade'] >= 86 && $row['grade'] <= 88)
    {
      echo '2.0';
    }elseif($row['grade'] >= 83 && $row['grade'] <= 85)
    {
      echo '2.25';
    }elseif($row['grade'] >= 80 && $row['grade'] <= 82)
    {
      echo '2.5';
    }elseif($row['grade'] >= 77 && $row['grade'] <= 79)
    {
      echo '2.75';
    }elseif($row['grade'] >= 75 && $row['grade'] <= 76)
    {
      echo '3.0';
    }elseif($row['grade'] < 75 && $row['grade'] >= 1)
    {
      echo '5';
    }elseif(empty($row['grade']) || $row['grade'] == 0.00 || $row['grade'] == NULL)
    {
      echo $row['grade'];
    }
  ?></td>
</tr>
<?php }?>
<?php endforeach?>
<?php endif; ?>
<?php endif; ?>
</tbody>
<tfoot>
  <tr>
    <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px; border-bottom:hidden;"></td>
    <td style="border-left: hidden;border-right: 1px solid black;border-top: solid black 1px;border-bottom:hidden;"></td>
    <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;"><?php if(empty($total_units4_2)){}else{echo $total_units4_2;}?></td>
    <td style="border-left: 1px solid black;border-right: 1px solid black;border-top: solid black 1px;border-bottom:hidden;"></td>
    <td style="border-left: hidden;border-right: hidden;border-top: solid black 1px;border-bottom:hidden;"></td>
  </tr>
</tfoot>
</table>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->



<center><h4><strong> TOTAL NUMBER OF UNITS : &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;
  <?php foreach($student_data as $data) {
  if($data['program'] == 'BSE'){
    foreach($countbse as $row) {
      echo $row['un'];
  }
  }elseif($data['program'] == 'BPA'){
    foreach($countbpa as $row) {
      echo $row['un'];
  }
  }
}
  ?></strong></h4></center>
<!-------------------------------------------------------------------------------------------------------------------------------------------------->



<div class="row col-sm-14 invoice-info">
  <div class="col-sm-10 invoice-col">
    <small><i>Grading System :</i></small><br>
    <address style="white-space: nowrap;"><br>
      <small>98-100 - 1.0 - Excellent</small><br>
      <small>95-97 - 1.25 - Outstanding</small><br>
      <small>92-94 - 1.5 - Very Good</small><br>
      <small>89-91 - 1.75 - Good</small><br>
      <small>86-88 - 2.0 - Very Satisfactory</small>
    </address>
  </div>

  <div class="col-sm-2 invoice-col pull-right">
      <address style="white-space: nowrap;"><br>
      <small>83-85 - 2.25 - Thourough Satisfactory</small><br>
      <small>80-82 - 2.5 - Satisfactory</small><br>
      <small>77-79 - 2.75 - Fair</small><br>
      <small>75-76 - 3.0 -  Passing</small><br>
      <small>Below 75 - 5 -Failed</small>
      </address>
  </div>

</div>



<div style="text-align:left; margin-top:60px;margin-right:60px;">
<?php foreach($signatory as $row) :?>
    <?php echo strtoupper($row['fullname'])?> <br>
    <?php echo ucfirst($row['position'])?> <br>
<?php endforeach?>
</div>

</div>
</section>
</body>
</html>
