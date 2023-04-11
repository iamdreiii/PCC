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
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="#">Examples</a></li>
<li class="active">Invoice</li>
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

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
From
<address>
<strong>Admin, Inc.</strong><br>
795 Folsom Ave, Suite 600<br>
San Francisco, CA 94107<br>
Phone: (804) 123-5432<br>
Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="70191e161f30111c1d11031115151403040514191f5e131f1d">[email&#160;protected]</a>
</address>
</div>

<div class="col-sm-4 invoice-col">
To
<address>
<strong>John Doe</strong><br>
795 Folsom Ave, Suite 600<br>
San Francisco, CA 94107<br>
Phone: (555) 539-1037<br>
Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd5d0d7d191dbd0daffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a>
</address>
</div>

<div class="col-sm-4 invoice-col">
<b>Invoice #007612</b><br>
<br>
<b>Order ID:</b> 4F3S8J<br>
<b>Payment Due:</b> 2/22/2014<br>
<b>Account:</b> 968-34567
</div>

</div>


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
<a href="<?=base_url('print_student_loads')?>" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Edit</a>
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
