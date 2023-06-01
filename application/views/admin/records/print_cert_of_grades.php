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
      margin:  0.25in; 
    }
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
    <hr style="margin-top: 15px; margin-bottom: 3px; border: 0.5px solid black;">
    <hr style="margin-top: 2px; margin-bottom: 5px; border: 1px solid black;">
    <h4 style="color:#907358; font-size: 26px;font-weight: 900;" id="label1">OFFICE OF THE REGISTRAR</h4>
    <h4 style="font-size: 24px;font-weight: bolder;"><b>CERTIFICATION OF GRADES</b></h4>
  </div>
</div>

<?php foreach($student_data as $row) :?>
<div class="col-sm-12" style="margin-bottom: 0px;">
  <p style="text-align: justify;">
    This is to certify that <strong><?php if($row['sex'] == 'Male'){echo 'Mr.';}else{echo 'Ms.';}?> <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?>, <?= ucfirst($row['lname'])?> </strong>
    has attained the following ratings in the various courses taken <div id="label"></div>  </p>
  
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

<div class="row">
<div class="col-xs-12 table-responsive">
<table class="table" style="text-align: center; padding-top:10px;">
<thead>
<tr class="spacing">
<th style="border: 1px solid black;text-align: center;">COURSE CODE</th>
<th style="border: 1px solid black;text-align: center;">COURSE DESCRIPTION</th>
<th style="border: 1px solid black;text-align: center;">CREDITS</th>
<th style="border: 1px solid black;text-align: center;">GRADES</th>
<th style="border: 1px solid black;text-align: center;">REMARKS</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
<?php foreach($student_data as $row) :?>
<div class="col-sm-12">
  <p style="text-align: justify;">This certification is being issued to <?php if($row['sex'] == 'Male'){echo 'Mr.';}else{echo 'Ms.';}?> <?= ucfirst($row['lname'])?> this 
  <?php $a = date('d');
  echo $a.substr(date('jS', mktime(0,0,0,1,($a%10==0?9:($a%100>20?$a%10:$a%100)),2000)),-2);?> day of <?= date('M')?>, <?= date('Y')?>
  for whatever legal purpose this may serve.
  </p>
</div>
<?php endforeach?>

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





<?php $this->load->view('admin/user/scripts/footer');?>



<link href="<?php echo base_url()?>assets/bootstraptoggle/bootstrap-toggle.min.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/bootstraptoggle/bootstrap-toggle.min.js"></script>
<?php $this->load->view('admin/records/cert_of_grades_script');?>
<?php $this->load->view('helpers/toastr');?>
</body>
</html>
