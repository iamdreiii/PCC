<!DOCTYPE html>
<html>
<?php $this->load->view('admin/user/layout/head');?>

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
<li><a href="<?=base_url()?>bse_student_loads_first_year"><i class="fa fa-dashboard"></i> Manage Student</a></li>
<li><a href="#">Subject</a></li>
<li class="active">Loads</li>
</ol>
</section>

<section class="invoice">

<div class="row">
<div class="col-xs-12">
<h2 class="page-header">
<i class="fa fa-globe"></i> AdminLTE, Inc.
<small class="pull-right">Date: 2/10/2014</small>
</h2>
</div>

</div>

<?php foreach($student_data as $row) :?>
<div class="row invoice-info">
<div class="col-sm-10 invoice-col">
<address>Name : <?= ucfirst($row['lname'])?>, <?= ucfirst($row['fname'])?> <?= ucfirst($row['mname'])?><br>
Address : <?= ucfirst($row['address'])?> <?= ucfirst($row['city_municipality'])?> <?= ucfirst($row['province'])?><br>
Course : <?php if($row['program'] = 'BSE') {echo 'Bachelor of Science in Entrepreneurship';}?><br>
Date of Admission : <br>
Place of Birth :  <?= ucfirst($row['birthplace'])?><br>
Elementary  Course Completed :  <?= ucfirst($row['primary_school_last_attended'])?><br>
High Shool Course Completed :  <?= ucfirst($row['secondary_school_last_attended'])?><br>
</address>
</div>


<div class="col-sm-2 invoice-col">
<b>Admission Credential:</b> Form 138-A<br>
<b>Date of Birth:</b> <?= ucfirst($row['birthdate'])?> <br>
</div>

</div>
<?php endforeach?>

<div class="row">
<div class="col-xs-12 table-responsive">
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
<?php foreach($student_loads as $row) :?>
<tr>
<td><?php echo $row['coursecode']?></td>
<td><?php echo $row['description']?></td>
<td><?php echo $row['units']?></td>
<td><?php echo $row['pre_req']?></td>
</tr>
<?php endforeach?>
</tbody>

</table>
</div>

</div>




<div class="row no-print">
<div class="col-xs-12">
<a href="<?=base_url()?>print_student_loads/<?= $id?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<a href="<?=base_url()?>view_student_loads/<?= $id?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
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
</body>
</html>
