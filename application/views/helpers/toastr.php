<link href="<?php echo base_url()?>assets/toastr/toastr.css" rel="stylesheet"/>
<script src="<?php echo base_url()?>assets/toastr/toastr.min.js"></script>
<script>
    function success(stat){
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
        function warning(stat){
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
                        toastr.warning(stat)
        }
        function error(stat){
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
        function info(stat){
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
                        toastr.info(stat)
        }
</script>