<link href="<?php echo base_url()?>assets/toastr/toastr.css" rel="stylesheet"/>
<script src="<?php echo base_url()?>assets/toastr/toastr.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    <?php if($this->session->tempdata('success',1)) : ?>
            var stat = "<?=$this->session->tempdata('success',1)?>";
            success(stat);
    <?php endif;?>
    function success(stats)
    {
        toastr.options = 
        {
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
        toastr.success(stats)
    }
    function error(stats)
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
      toastr.error(stats)
    }
});
</script>
