
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PCC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?php echo base_url(); ?>assets/staff/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/staff/bootstrap/js/bootstrap.min.js"></script>
  <link href="<?php echo base_url()?>assets/toastr/toastr.css" rel="stylesheet"/>
  
</head>
<body class="hold-transition login-page" style="background-image: url('<?=base_url()?>assets/img/bg.png'); background-size: cover;">

<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url()?>staff"><b>P&emsp;C&emsp;C</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to login to Dashboard</p>
    
    <form id="logForm">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><span id="logText"></span></button>
        </div>
      </div>
    </form>
    <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
				<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
				<span id="message"></span>
			</div>
  </div>
</div>
<script src="<?php echo base_url()?>assets/toastr/toastr.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#logText').html('Login');
		$('#logForm').submit(function(e){
			e.preventDefault();
			$('#logText').html('Checking...');
			var url = '<?php echo base_url(); ?>';
			var user = $('#logForm').serialize();
			var login = function(){
				$.ajax({
                  type: 'POST',
                  url: url + 'Login/login',
                  dataType: 'json',
                  data: user,
                  success:function(response){
                                    
                                    $('#message').html(response.message);
                                    $('#logText').html('Login');
                                    if(response.error){
                                      var stat = response.message;
                                      error(stat);
                                      // $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                                    }
                                    else{
                                          // var stat = response.message;
                                          // success(stat);
                                          $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                                          $('#logForm')[0].reset();
                                            location.reload();
                                            
                                        }
                                  },error: function(jqXHR, textStatus, errorThrown) {
                                      var stat = 'Login Failed';
                                      error(stat);
                                  }
                });
			};
			login();
		});
 
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
    <?php if($this->session->tempdata('success',1)) : ?>
            var stat = "<?=$this->session->tempdata('success',1)?>";
            success(stat);
    <?php endif;?>
    // TOASTR
    function success(stat)
    {
      toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": false,
                      "positionClass": "toast-bottom-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "200",
                      "hideDuration": "1000",
                      "timeOut": "3000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                      }
      toastr.success(stat)
    }
    function error(stat)
    {
      toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": false,
                      "positionClass": "toast-bottom-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "200",
                      "hideDuration": "1000",
                      "timeOut": "3000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                      }
      toastr.error(stat)
    }
	});
</script>

</body>
</html>
