<script type="text/javascript">
        var save_method; //for save method string
        var table;
        
        $(document).ready(function() {

            table = $('#table').DataTable({
                "stateSave": true,
                "searching": true,
                "processing": true,
                "serverSide" : true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                "pageLength": 10,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('User/user_list')?>",
                    "type": "POST"
                },
                "columnDefs": [
                { 
                    "targets": [ 0 ], 
                    "orderable": false, 
                },
                ],
                'language': {
                                'lengthMenu': 'Show _MENU_ entries',
                                'search': 'Search',
                                'zeroRecords': 'No matching records found',
                                'info': 'Showing _START_ to _END_ of _TOTAL_ entries',
                                'infoEmpty': 'Showing 0 to 0 of 0 entries',
                                'infoFiltered': '(filtered from _MAX_ total entries)',
                                'processing': '<i class="fa fa-spinner fa-spin fa-fw"></i> Loading Students...'
                            }
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
            $('#select-all').click(function() {
        // Get all checkboxes in the DataTable
        var checkboxes = table.column(0).nodes().to$().find(':checkbox');
        // Set the state of all checkboxes to the state of the "select all" checkbox
        checkboxes.prop('checked', this.checked);
        // Trigger change event on all checkboxes to update their state in DataTable's internal data model
        checkboxes.trigger('change');
    });
        });
        
       
        function add_user()
        {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Student'); // Set Title to Bootstrap modal title
        }

        function add_user2()
        {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form2').modal('show'); // show bootstrap modal
            $('.modal-title').text(' Admission Form'); // Set Title to Bootstrap modal title
        }

        function edit_user(id)
        {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('User/user_edit/')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id"]').val(data.id);
                    $('[name="fname"]').val(data.fname);
                    $('[name="mname"]').val(data.mname);
                    $('[name="lname"]').val(data.lname);
                    $('[name="date_of_birth"]').val(data.date_of_birth);
                    $('[name="gender"]').val(data.gender);
                    $('[name="extensions"]').val(data.extensions);
                    $('[name="email"]').val(data.email);
                    $('[name="phone_number"]').val(data.phone_number);
                    $('[name="address"]').val(data.address);
                    $('[name="enrollment_status"]').val(data.enrollment_status);
                    $('[name="course"]').val(data.course);
                    $('[name="year_level"]').val(data.year_level);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Student'); // Set title to Bootstrap modal title
                    
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
            table.ajax.reload(null,false); //reload datatable ajax 
        }

        function save()
        {
            // Reset error messages
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();

            if(save_method == 'add') {
            // Check for empty inputs
            var requiredFields = ['fname', 'lname', 'email', 'password', 'gender', 'date_of_birth', 'phone_number', 'address','course', 'year_level', 'enrollment_status'];
            var isValid = true;
            $.each(requiredFields, function(index, field) {
                if (!$.trim($('[name="' + field + '"]').val())) {
                    $('[name="' + field + '"]').parent().parent().addClass('has-error');
                    $('[name="' + field + '"]').next().text('This field is required.');
                    isValid = false;
                }
            });

            // VALIDATE EMAIL
            // Check if email already exists in database
            var email = $('[name="email"]').val();
            $.ajax({
                url : "<?php echo site_url('User/validate_email')?>",
                type: "POST",
                data: {email: email},
                dataType: "JSON",
                success: function(data) {
                    if (data.status == false) {
                        $('[name="email"]').parent().parent().addClass('has-error');
                        $('[name="email"]').next().text('This email already exists.');
                        isValid = false;
                    }
                },
                async: false // Make synchronous AJAX call to ensure validation is done before saving
            });
            if (!isValid) {
                return false;
            }
            }
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;

            if(save_method == 'add') {
                url = "<?php echo site_url('User/user_add')?>";
            } else {
                url = "<?php echo site_url('User/user_update')?>";
            }

            // ajax adding data to database
            $.ajax({
                url : url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status) //if success close modal and reload ajax table
                    {
                        // if adding data
                        if(save_method == 'add'){
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'User Added';
                            success(stat);
                        // if updating data
                        }else{
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'User Updated';
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
        //LOAD COURSES 
        $.ajax({
            url: '<?php echo base_url("User/get_courses"); ?>',
            dataType: 'json',
            success: function(courses) {
                // Populate the dropdown list with the courses
                var options = '';
                $.each(courses, function(index, course) {
                    options += '<option value="' + course.course + '">' + course.course + '</option>';
                });
                $('#course').html(options);
            }
        });
        //LOAD CLASSES 
        $.ajax({
            url: '<?php echo base_url("User/get_classes"); ?>',
            dataType: 'json',
            success: function(classes) {
                // Populate the dropdown list with the courses
                var options = '';
                $.each(classes, function(index, classes) {
                    options += '<option value="' + classes.id + '">' + classes.name + '</option>';
                });
                $('#class_id').html(options);
            }
        });
        //LOAD CLASSES 2
        $.ajax({
            url: '<?php echo base_url("User/get_classes"); ?>',
            dataType: 'json',
            success: function(classes) {
                // Populate the dropdown list with the courses
                var options = '';
                $.each(classes, function(index, classes) {
                    options += '<option value="' + classes.id + '">' + classes.name + '</option>';
                });
                $('#filter_class').html(options);
            }
        });
        //LOAD Year Level 
        $.ajax({
            url: '<?php echo base_url("User/get_year_level"); ?>',
            dataType: 'json',
            success: function(year_level) {
                // Populate the dropdown list with the courses
                var options = '';
                $.each(year_level, function(index, year_level) {
                    options += '<option value="' + year_level.year + '">' + year_level.year + '</option>';
                });
                $('#year_level').html(options);
            }
        });
         //LOAD Year Level 2
         $.ajax({
            url: '<?php echo base_url("User/get_year_level"); ?>',
            dataType: 'json',
            success: function(year_level) {
                // Populate the dropdown list with the courses
                var options = '';
                $.each(year_level, function(index, year_level) {
                    options += '<option value="' + year_level.year + '">' + year_level.year + '</option>';
                });
                $('#filter_year_level').html(options);
            }
        });
        function delete_user(id) {
            var modal = deletemodal(function(result) {
                if (result) {
                    // ajax delete data from database
                    $.ajax({
                        url: "<?php echo site_url('User/user_delete')?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'User Deleted';
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
                alert('Please select at least one user to delete.');
                return false;
            }
            var modal = deletemodal(function(result) {
                if (result) {
                    // send the selected IDs to the delete controller method via AJAX
                    $.ajax({
                        url: '<?php echo site_url("User/delete_multiple"); ?>',
                        type: 'POST',
                        data: {ids: ids},
                        success: function(response) {
                            // handle the response from the server (e.g. reload the DataTable)
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'Users Deleted';
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
            var selectedUsers = $('input[name="selected[]"]:checked');
            if (selectedUsers.length === 0) {
            alert('Please select at least one user.');
            } else {
            $('#class_modal').modal('show');
            }
        });

        $('#save_class_btn').click(function() {
            var class_id = $('#class_id').val();
            var user_ids = $('input[name="selected[]"]:checked').map(function() {
            return this.value;
            }).get();

            if (user_ids.length === 0) {
            alert('Please select at least one user.');
            return;
            }

            $.ajax({
            type: "POST",
            url: "<?php echo site_url('User/update_class_id'); ?>",
            data: {class_id: class_id, user_ids: user_ids},
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
                            <h5 class="modal-title">Delete User/s</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this User/s?</p>
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

