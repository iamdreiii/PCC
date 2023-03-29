<script type="text/javascript">
var save_method; //for save method string
var table1;
var table2;
var table3;
var table4;
var table5;
var table6;
var table7;
var table8;

$(document).ready(function() {

    table1 = $('#table1').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : false,
        'autoWidth'   : false,
        "searching": false,
        "processing": true,
        "serverSide" : true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('Prereq/sub1_list')?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false, 
        },
        ]
    });
});
$(document).ready(function() {

table2 = $('#table2').DataTable({
    'paging'      : false,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : false,
    'info'        : false,
    'autoWidth'   : false,
    "searching": false,
    "processing": true,
    "serverSide" : true,
    "order": [],
    "ajax": {
        "url": "<?php echo site_url('Prereq/sub2_list')?>",
        "type": "POST"
    },
    "columnDefs": [
    { 
        "targets": [ 0 ], 
        "orderable": false, 
    },
    ]
});
});
$(document).ready(function() {

table3 = $('#table3').DataTable({
    'paging'      : false,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : false,
    'info'        : false,
    'autoWidth'   : false,
    "searching": false,
    "processing": true,
    "serverSide" : true,
    "order": [],
    "ajax": {
        "url": "<?php echo site_url('Prereq/sub3_list')?>",
        "type": "POST"
    },
    "columnDefs": [
    { 
        "targets": [ 0 ], 
        "orderable": false, 
    },
    ]
});
});
$(document).ready(function() {
table4 = $('#table4').DataTable({
    'paging'      : false,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : false,
    'info'        : false,
    'autoWidth'   : false,
    "searching": false,
    "processing": true,
    "serverSide" : true,
    "order": [],
    "ajax": {
        "url": "<?php echo site_url('Prereq/sub4_list')?>",
        "type": "POST"
    },
    "columnDefs": [
    { 
        "targets": [ 0 ], 
        "orderable": false, 
    },
    ]
});
});
$(document).ready(function() {
table5 = $('#table5').DataTable({
    'paging'      : false,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : false,
    'info'        : false,
    'autoWidth'   : false,
    "searching": false,
    "processing": true,
    "serverSide" : true,
    "order": [],
    "ajax": {
        "url": "<?php echo site_url('Prereq/sub5_list')?>",
        "type": "POST"
    },
    "columnDefs": [
    { 
        "targets": [ 0 ], 
        "orderable": false, 
    },
    ]
});
});
$(document).ready(function() {
table6 = $('#table6').DataTable({
    'paging'      : false,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : false,
    'info'        : false,
    'autoWidth'   : false,
    "searching": false,
    "processing": true,
    "serverSide" : true,
    "order": [],
    "ajax": {
        "url": "<?php echo site_url('Prereq/sub6_list')?>",
        "type": "POST"
    },
    "columnDefs": [
    { 
        "targets": [ 0 ], 
        "orderable": false, 
    },
    ]
});
});
$(document).ready(function() {
table7 = $('#table7').DataTable({
    'paging'      : false,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : false,
    'info'        : false,
    'autoWidth'   : false,
    "searching": false,
    "processing": true,
    "serverSide" : true,
    "order": [],
    "ajax": {
        "url": "<?php echo site_url('Prereq/sub7_list')?>",
        "type": "POST"
    },
    "columnDefs": [
    { 
        "targets": [ 0 ], 
        "orderable": false, 
    },
    ]
});
});
$(document).ready(function() {
table8 = $('#table8').DataTable({
    'paging'      : false,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : false,
    'info'        : false,
    'autoWidth'   : false,
    "searching": false,
    "processing": true,
    "serverSide" : true,
    "order": [],
    "ajax": {
        "url": "<?php echo site_url('Prereq/sub8_list')?>",
        "type": "POST"
    },
    "columnDefs": [
    { 
        "targets": [ 0 ], 
        "orderable": false, 
    },
    ]
});
});

function edit_prereq(id)
{
    save_method = 'update';
    $('#form1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Prereq/prereq_edit1')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            //console.log(data);
            $('[name="id"]').val(data.id);
            $('[name="subjects1"]').val(data.subcode);
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Subject Prerequisite'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            var stat = 'Error Loading Data';
            error(stat);
        }
    });
}

function reload_table()
{
    table1.ajax.reload(null,false); 
    table2.ajax.reload(null,false);
    table3.ajax.reload(null,false);
    table4.ajax.reload(null,false);
    table5.ajax.reload(null,false);
    table6.ajax.reload(null,false);
    table7.ajax.reload(null,false);
    table8.ajax.reload(null,false);
}
function save()
        {
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();

            $('#btnSave').text('saving...'); 
            $('#btnSave').attr('disabled',true); 
            var url;

            if(save_method == 'add') {
                url = "<?php echo site_url('Prereq/prereq_add')?>";
            } else {
                url = "<?php echo site_url('Prereq/prereq_update')?>";
            }
            //console.log($('#form').serialize());
            // ajax adding data to database
            $.ajax({
                url : url,
                type: "POST",
                data: $('#form1').serialize(),
                
                dataType: "JSON",
                success: function(data)
                {
                    
                    if(data.status)
                    {
                        // if adding data
                        if(save_method == 'add'){
                            $('#modal_form1').modal('hide');
                            reload_table();
                            var stat = 'Subject Added';
                            success(stat);
                        // if updating data
                        }else{
                            $('#modal_form1').modal('hide');
                            reload_table();
                            var stat = 'Subject Prerequisite Updated';
                            success(stat);
                        }
                    }
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
                            
                        }
                    }
                    $('#btnSave').text('save');
                    $('#btnSave').attr('disabled',false);


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    var stat = 'Add/Update Failed';
                    error(stat);
                    $('#btnSave').text('save'); 
                    $('#btnSave').attr('disabled',false); 

                }
            });
        }

    // LOAD Subjects
    $.ajax({
        url: '<?php echo base_url("Prereq/get_subjects"); ?>',
        dataType: 'json',
        success: function(subject) {
            // Populate the dropdown list with the courses
            var options = '';
            $.each(subject, function(index, subject) {
                options += '<option>Select Subject</option></option>/';
                options += '<option value="' + subject.id + '">' + subject.subcode + ' - ' + subject.description + '</option>';
            });
            $('#subjects').html(options);
        }
    });
    $.ajax({
        url: '<?php echo base_url("Prereq/get_subjects"); ?>',
        dataType: 'json',
        success: function(subject) {
            // Populate the dropdown list with the courses
            var options = '';
            options += '<option value"none">NONE</option>';
            $.each(subject, function(index, subject) {
                
                options += '<option value="' + subject.subcode + '">' + subject.subcode + ' - ' + subject.description + '</option>';
            });
            $('#subjects1').html(options);
        }
    });
    // TOASTR
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