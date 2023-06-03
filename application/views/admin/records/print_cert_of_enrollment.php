<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<link rel="stylesheet" href="<?=base_url()?>assets/record/print.css" media="print">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<style>
  body{
    font-size: 20px;
    font-style: justify;
  }
  #label1 {
    print-color-adjust: exact !important; 
    color-adjust: exact !important; 
    color-adjust:exact !important; 
    color:#925b27 !important; 
   }
   @media print {
    @page {
      font-size: 20px;
      margin:  0.75in; 
    }
   }
</style>
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
    <hr style="margin-top: 15px; margin-bottom: 3px; border: 0.5px solid black;">
    <hr style="margin-top: 2px; margin-bottom: 5px; border: 1px solid black;">
    <h4 style="color:#907358; font-size: 26px;font-weight: 900;" id="label1">OFFICE OF THE REGISTRAR</h4>
    <h4 style="font-size: 22px;font-weight: 900;">CERTIFICATION OF ENROLLMENT</h4>
  </div>
</div>


<div class="col-sm-12" style="margin-bottom:35px;margin-top:35px;">
    <p><?php echo date('F d, Y ')?></p>
</div>
<div class="col-sm-12" style="margin-bottom:40px;">
    <p>To whom it may concern:</p>
</div>
<?php foreach($student_data as $row) :?>
<div class="col-sm-12" style="margin-bottom: 0px;">
  <p style="text-align: justify;">
    This is to certify that <strong><?php if($row['sex'] == 'Male'){echo 'Mr.';}else{echo 'Ms.';}?> <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?>, <?= ucfirst($row['lname'])?></strong> 
    is a bonafide student of Pola Community College and is currently enrolled as a <?php if($row['year_level'] == '1st Year'){echo 'First Year';}elseif($row['year_level'] == '2nd Year'){echo 'Second Year';}elseif($row['year_level'] == '3rd Year'){echo 'Third Year';}elseif($row['year_level'] == '4th Year'){echo 'Fourth Year';}?> 
    (<?php if($row['sem'] == 1){echo  'First Semester';}elseif($row['sem'] == 2){echo  'Second Semester';}?> A.Y. <?php foreach($sy as $sy) {if($sy['status'] == 'active'){echo $sy['school_year'];}} ?> )
    student under <?= $row['cd']?>.
    
  </p>
  
</div>
<?php endforeach?>

<?php foreach($student_data as $row) :?>
<div class="col-sm-12" style="margin-top:35px;">
  <p style="text-align: justify;">This certification is being issued to <strong><?php if($row['sex'] == 'Male'){echo 'Mr.';}else{echo 'Ms.';}?> <?= ucfirst($row['lname'])?></strong> this 
  <?php $a = date('d');
  echo $a.substr(date('jS', mktime(0,0,0,1,($a%10==0?9:($a%100>20?$a%10:$a%100)),2000)),-2);?> day of <?= date('F')?>, <?= date('Y')?>
  for whatever legal purpose this may serve.
  </p>
</div>
<?php endforeach?>

<div class="col-sm-12">
<div style="text-align:left; margin-top:80px;">
   <p>Very truly yours,</p>
</div>

<div style="text-align:left; margin-top:60px;margin-right:60px;">
<?php foreach($signatory as $row) :?>
    <p style="font-weight: 900;margin-bottom:0px;"><u><?php echo strtoupper($row['fullname'])?></u></p>
    <p style="margin-left:30px;margin-top:0px;"><?php echo ucfirst($row['position'])?> </p><br>
<?php endforeach?>
</div>
</div>
</div>

</div>


</section>





<?php $this->load->view('admin/user/scripts/footer');?>



<link href="<?php echo base_url()?>assets/bootstraptoggle/bootstrap-toggle.min.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/bootstraptoggle/bootstrap-toggle.min.js"></script>
<?php $this->load->view('admin/records/cert_of_grades_script');?>
<?php $this->load->view('helpers/toastr');?>
</body>
</html>
