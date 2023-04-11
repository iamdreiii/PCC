
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php $this->load->view('admin/user/layout/head');?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script nonce="3d834fa7-28d1-4d4e-8237-9f10ec8d35b3">(function(w,d){!function(bv,bw,bx,by){bv[bx]=bv[bx]||{};bv[bx].executed=[];bv.zaraz={deferred:[],listeners:[]};bv.zaraz.q=[];bv.zaraz._f=function(bz){return function(){var bA=Array.prototype.slice.call(arguments);bv.zaraz.q.push({m:bz,a:bA})}};for(const bB of["track","set","debug"])bv.zaraz[bB]=bv.zaraz._f(bB);bv.zaraz.init=()=>{var bC=bw.getElementsByTagName(by)[0],bD=bw.createElement(by),bE=bw.getElementsByTagName("title")[0];bE&&(bv[bx].t=bw.getElementsByTagName("title")[0].text);bv[bx].x=Math.random();bv[bx].w=bv.screen.width;bv[bx].h=bv.screen.height;bv[bx].j=bv.innerHeight;bv[bx].e=bv.innerWidth;bv[bx].l=bv.location.href;bv[bx].r=bw.referrer;bv[bx].k=bv.screen.colorDepth;bv[bx].n=bw.characterSet;bv[bx].o=(new Date).getTimezoneOffset();if(bv.dataLayer)for(const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ,bK)=>({...bJ[1],...bK[1]})))))zaraz.set(bI[0],bI[1],{scope:"page"});bv[bx].q=[];for(;bv.zaraz.q.length;){const bL=bv.zaraz.q.shift();bv[bx].q.push(bL)}bD.defer=!0;for(const bM of[localStorage,sessionStorage])Object.keys(bM||{}).filter((bO=>bO.startsWith("_zaraz_"))).forEach((bN=>{try{bv[bx]["z_"+bN.slice(7)]=JSON.parse(bM.getItem(bN))}catch{bv[bx]["z_"+bN.slice(7)]=bM.getItem(bN)}}));bD.referrerPolicy="origin";bD.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bv[bx])));bC.parentNode.insertBefore(bD,bC)};["complete","interactive"].includes(bw.readyState)?zaraz.init():bv.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body onload="window.print();">
<div class="wrapper">

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
<div class="col-sm-10 invoice-col">
<address>Name :<br>
Address : <br>
Course : <br>
Date of Admission : <br>
Place of Birth : <br>
Elementary  Course Completed : <br>
High Shool Course Completed : <br>
</address>
</div>


<div class="col-sm-2 invoice-col">
<b>Admission Credential:</b> Form 138-A<br>
<b>Date of Birth:</b><br>
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
