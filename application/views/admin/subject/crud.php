<script type="text/javascript">
        var save_method; //for save method string
        var table;
        
        $(document).ready(function() {

            table = $('#example').DataTable({
               
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('Subject/subject_list')?>",
                    "type": "POST"
                },
                "columnDefs": [
                    { 
                        "targets": [ 0 ], 
                        "orderable": false 
                    }
                ],
                "pagingType": "full_numbers",
                "pageLength": 10,
                "lengthChange": true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    });

           


            $("input").change(function(){
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function(){
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function(){
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $('.dataTables_filter input').unbind().keyup(function(e) {
                var value = $(this).val();
               
                if (value.length >= 3 || value.length == 0) {
                    table.search(value).draw();
                }
            });
        });
        function reload_table()
        {
            table.ajax.reload(null,false); 
        }

       
        function add_subject()
        {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Subject'); // Set Title to Bootstrap modal title
        }

        function add_subject2()
        {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form2').modal('show'); // show bootstrap modal
            $('.modal-title').text(' Admission Form'); // Set Title to Bootstrap modal title
        }

        function edit_subject(id)
        {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('Subject/subject_edit/')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id"]').val(data.id);
                    $('[name="subcode"]').val(data.subcode);
                    $('[name="description"]').val(data.description);
                    $('[name="units"]').val(data.units);
                    $('[name="year_level"]').val(data.year_level);
                    $('[name="semester"]').val(data.semester);
                    $('[name="program_id"]').val(data.program_id);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Subject'); // Set title to Bootstrap modal title
                    
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    var stat = 'Error Loading Data';
                    error(stat);
                }
            });
        }

        
        function save()
        {
            // Reset error messages
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();

            if(save_method == 'add') {
            // Check for empty inputs
            var requiredFields = ['subcode', 'description', 'units', 'year_level', 'semester', 'program_id'];
            var isValid = true;
            $.each(requiredFields, function(index, field) {
                if (!$.trim($('[name="' + field + '"]').val())) {
                    $('[name="' + field + '"]').parent().parent().addClass('has-error');
                    $('[name="' + field + '"]').next().text('This field is required.');
                    isValid = false;
                }
            });
            }
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;

            if(save_method == 'add') {
                url = "<?php echo site_url('Subject/subject_add')?>";
            } else {
                url = "<?php echo site_url('Subject/subject_update')?>";
            }

            // ajax adding data to database
            $.ajax({
                url : url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    //console.log(data);
                    if(data.status) //if success close modal and reload ajax table
                    {
                        // if adding data
                        if(save_method == 'add'){
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'Subject Added';
                            success(stat);
                        // if updating data
                        }else{
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'Subject Updated';
                            success(stat);
                        }
                    }
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                            
                        }
                    }
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    var stat = 'Add/Update Failed';
                    error(stat);
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 

                }
            });
        }
        function delete_subject(id) {
            var modal = deletemodal(function(result) {
                if (result) {
                    // ajax delete data from database
                    $.ajax({
                        url: "<?php echo site_url('Subject/subject_delete')?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'subject Deleted';
                            success(stat);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            var stat = 'Delete Failed';
                            error(stat);
                        }
                    });
                }
            });
        }




        $('#delete-selected').click(function() {
            var selected = $('input[name="selected[]"]:checked'); // get all checked checkboxes
            var ids = selected.map(function() {
                return this.value;
            }).get(); // extract the value (ID) of each checked checkbox
            if (ids.length === 0) {
                // show an error message if no checkboxes are selected
                alert('Please select at least one subject to delete.');
                return false;
            }
            var modal = deletemodal(function(result) {
                if (result) {
                    // send the selected IDs to the delete controller method via AJAX
                    $.ajax({
                        url: '<?php echo site_url("subject/delete_multiple"); ?>',
                        type: 'POST',
                        data: {ids: ids},
                        success: function(response) {
                            // handle the response from the server (e.g. reload the DataTable)
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'subjects Deleted';
                            success(stat);
                        },
                        error: function(xhr) {
                            // handle any errors that occur
                            var stat = 'Delete Failed';
                            error(stat);
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
        $('#update_btn').click(function() {
            var selectedsubjects = $('input[name="selected[]"]:checked');
            if (selectedsubjects.length === 0) {
            alert('Please select at least one subject.');
            } else {
            $('#class_modal').modal('show');
            }
        });

        $('#save_class_btn').click(function() {
            var class_id = $('#class_id').val();
            var subject_ids = $('input[name="selected[]"]:checked').map(function() {
            return this.value;
            }).get();

            if (subject_ids.length === 0) {
            alert('Please select at least one subject.');
            return;
            }

            $.ajax({
            type: "POST",
            url: "<?php echo site_url('subject/update_class_id'); ?>",
            data: {class_id: class_id, subject_ids: subject_ids},
            success: function(response) {
                reload_table();
                var stat = response;
                success(stat);
            }
            });

            $('#class_modal').modal('hide');
        });
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
        function deletemodal(callback) {
        // Create modal HTML
        var modalHtml = `
            <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete subject/s</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this subject/s?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="delete_confirm">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Add modal HTML to the page
        $('body').append(modalHtml);

        // Show the modal
        $('#delete_modal').modal('show');

        // Handle confirm button click
        $('#delete_confirm').on('click', function() {
            // Call the callback function with true to indicate confirmation
            callback(true);

            // Hide the modal
            $('#delete_modal').modal('hide');
        });

        // Handle cancel button click and modal close
        $('#delete_modal').on('hidden.bs.modal', function() {
            // Call the callback function with false to indicate cancellation
            callback(false);

            // Remove the modal from the DOM
            $(this).remove();
        });

        // Return the modal element
        return $('#delete_modal');
    }

    </script>

