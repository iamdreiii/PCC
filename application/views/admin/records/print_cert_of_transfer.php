<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<style media="print">
@media print {
  @page {
    size: folio;
    margin: 0.25in;
    margin-top: 0.25in;
    margin-right: 0.25in;
    margin-left: 0.25in;
    margin-bottom: 0.25in;
  }
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
  font-size: 16px !important;
  }
  #backButton {
    display: none !important; 
  }
  ::-webkit-scrollbar {
      display: none;
  }
  #label1 {
    print-color-adjust: exact !important; 
    color-adjust: exact !important; 
    color-adjust:exact !important; 
    color:#925b27 !important; 
   }
}
 
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<body>


<section class="col-xs-12">

<button class="btn btn-primary pull-right" onclick="window.print();" id="backButton"><i class="fa fa-print"></i> Print</button>

<div class="row" style="margin-top: 5px; margin-bottom: 5px;">
  <div class="text-center">
    <div class="d-flex justify-content-center align-items-center">
      <div style="position: absolute; left: 3%; top: 0;">
        <img src="<?= base_url()?>assets/img/PCC.png" alt="" style="width:85px; height:85px;">
      </div>
      <div style="margin-left: auto; margin-right: auto;">
        <h3 style="margin-top: 5px; margin-bottom: 5px;">
          <b>POLA COMMUNITY COLLEGE</b>
        </h3>
      </div>
    </div>
    <h5 style="margin-top: 5px; margin-bottom: 5px;"><b>Zone II, Pola Oriental Mindoro</b></h5>
    <h6 style="margin-top: 5px; margin-bottom: 5px; font-size:11px;"><b>Phone: +(63)9560875992 | E-mail: polacommunitycollege2020@gmail.com</b></h6>
    <hr style="border-style:solid;border-width:1px;border-left:none;border-right:none;margin-bottom:1px;">
    <hr style="border-style:solid;border-width:1px;border-left:none;border-right:none;margin-top:1px;">
    <h4 style="color:#907358; font-size: 26px;font-weight: 900;" id="label1">OFFICE OF THE REGISTRAR</h4>
    <h4 style="font-size: 19px;font-weight: 900;"><b>CERTIFICATE OF TRANSFER CREDENTIAL</b></h4>
  </div>
</div><br>



<?php foreach($student_data as $row) :?>

<div class="col-sm-12">
        <div class="body" style="text-align: justify;">
            This is to certify that <?php if($row['sex'] == 'Male'){echo 'Mr.';}else{echo 'Ms.';}?> <?= ucfirst($row['fname'])?> <?=ucfirst($row['mname'])?>. <?= ucfirst($row['lname'])?> as student of <?= $row['cd']?> of this College and hereby granted Certificate of Transfer Credential effective <?= date('F d, Y')?>.<br><br>
            <?php if($row['sex'] == 'Male'){echo 'His';}else{echo 'Her';}?> transcript of records will be forwarded upon receipt of the duly accomplished slip below.<br><br>
        </div>
</div>
<?php endforeach?>

<div class="col-sm-12" style="text-align:right; margin-top:10px;margin-bottom:10px;margin-right:60px;">
  <?php foreach($signatory as $row) :?>
      <strong><u><?php echo strtoupper($row['fullname'])?></u></strong><br>
      <p style="margin-right:30px;"><?php echo ucfirst($row['position'])?> </p><br>
  <?php endforeach?>
</div>

<hr style="border-style:dotted;border-width:1px;border-left:none;border-right:none;margin-top:1px;">

<div class="col-xs-12 text-center">
  <h4 style="font-size: 19px;font-weight: 900;"><b>RETURN SLIP</b></h4>
</div><br>
<div class="col-sm-12" style="text-align:left; margin-top:10px;margin-bottom:10px;margin-right:60px;">
<p style="margin-bottom:1px;">The Registrar</p>
<p style="margin-bottom:1px;margin-top:1px;">Pola Community College</p>
<p style="margin-top:1px;">Zone II, Pola Oriental Mindoro</p><br>
<p>Sir/Madam:</p>
</div>
<?php foreach($student_data as $row) :?>
<div class="col-sm-12" style="text-align: justify;">
<p>&emsp;&emsp;<?php if($row['sex'] == 'Male'){echo 'Mr.';}else{echo 'Ms.';}?> <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?>. <?= ucfirst($row['lname'])?>
  has applied for enrollment in the program of <span style="display: inline-block; width: 300px; border-bottom: 1px solid;">&nbsp;</span>
  , and has been temporarily admitted receipt of <?php if($row['sex'] == 'Male'){echo 'his';}else{echo 'her';}?> Official Transcript of Records from your College.
</p>
<p>&emsp;&emsp;In this regard, may I respectfully request the issuance of <?php if($row['sex'] == 'Male'){echo 'his';}else{echo 'her';}?>
  Transcript of Records as soon as possible.
</p>
</div>
<div class="col-sm-12" style="text-align: right;">
<span style="display: inline-block; width: 300px; border-bottom: 1px solid;">&nbsp;</span>
<p class="" style="margin-right:70px;"><strong>College Registrar</strong></p>
</div><br>
<div class="col-sm-12" style="text-align: left;">
<span style="display: inline-block; width: 300px; border-bottom: 1px solid;">&nbsp;</span>
<p class="" style="margin-left:90px;"><strong>Name of School</strong></p>
</div><br>
<div class="col-sm-12" style="text-align: left;">
<span style="display: inline-block; width: 300px; border-bottom: 1px solid;">&nbsp;</span>
<p class="" style="margin-left:100px;"><strong>Address</strong></p>
</div>
<?php endforeach?>


</section>





<?php $this->load->view('admin/user/scripts/footer');?>
<?php $this->load->view('helpers/toastr');?>
</body>
</html>
