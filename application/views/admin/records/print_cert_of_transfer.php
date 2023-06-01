<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>
<style>
hr.double {
  border-style: double;
  border-width: 3px;
  border-left: hidden;
  border-right: hidden;
  height: 0;
}

@media print 
{
  
      /* Set the margin for the letter-sized document */
    @page {
        size: letter;
        margin: 0.75in;
    }
    /* body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        font-size: 18px !important;
    } */
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    font-size: 18px !important;
  }
      #backButton {
        display: none !important; 
      }
      ::-webkit-scrollbar {
          display: none;
      }
    hr.double {
      border-style: double;
      border-width: 3px;
      border-left: hidden;
      border-right: hidden;
      height: 0;
    }
}
 

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<body>


<section class="invoice">

<button class="btn btn-primary pull-right" onclick="window.print();" id="backButton"><i class="fa fa-print"></i> Print</button>

<div class="row" style="margin-top: 5px; margin-bottom: 5px;">
  <div class="col-xs-12 text-center">
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
    <hr class="double">
    <h4 style="color:#907358;"><b>OFFICE OF THE REGISTRAR</b></h4>
    <h4><b>CERTIFICATION OF GRADES</b></h4>
  </div>
</div><br>



<?php foreach($student_data as $row) :?>

<div class="col-sm-12">
        <div class="date"><?= date('F d, Y')?></div><br>
        <div class="body" style="text-align: justify;">
            To whom it may concern:<br><br>
            This is to certify that <?php if($row['sex'] == 'Male'){echo 'Mr.';}else{echo 'Ms.';}?> <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?>, <?= ucfirst($row['lname'])?> is a bonafide student of Pola Community College and is currently enrolled as a Second Year (Second Semester: 2020-2023) student under Bachelor of Public Administration.<br><br>
            This certification is being issued to Mr. Dela Cruz this <?php $a = date('d');
  echo $a.substr(date('jS', mktime(0,0,0,1,($a%10==0?9:($a%100>20?$a%10:$a%100)),2000)),-2);?> day of <?= date('M')?>, <?= date('Y')?> for whatever legal purpose this may serve.<br><br>
        </div>
</div>
<?php endforeach?>
<div  class="col-sm-12" style="text-align:left; margin-top:20px;">
   <p>
    Very truly yours,
   </p>
</div>

<div class="col-sm-12" style="text-align:left; margin-top:50px;margin-right:60px;">
<?php foreach($signatory as $row) :?>
    <strong><u><?php echo strtoupper($row['fullname'])?></u></strong><br>
    <p style="margin-left:30px;"><?php echo ucfirst($row['position'])?> </p><br>
<?php endforeach?>
</div>
</div>

</div>


</section>





<?php $this->load->view('admin/user/scripts/footer');?>
<?php $this->load->view('helpers/toastr');?>
</body>
</html>
