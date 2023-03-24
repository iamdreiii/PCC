<script type="text/javascript">
        var save_method; //for save method string
        var table;
        
        $(document).ready(function() {

            table = $('#table').DataTable({
                "searching": true,
                "processing": true,
                "serverSide" : true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                "pageLength": 10,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('Blog/blog_list')?>",
                    "type": "POST"
                },
                "columnDefs": [
                { 
                    "targets": [ -1 ], 
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

            //set input/textarea/select event when change value, remove class error and remove text help block 
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


       
        function add_blog()
        {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#blog_modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Announcement'); // Set Title to Bootstrap modal title
        }

        function edit_blog(id)
        {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('Blog/blog_edit/')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id"]').val(data.id);
                    $('[name="title"]').val(data.title);
                    // $('[name="path"]').val(data.path);
                    $('[name="description"]').val(data.description);
                    $('#blog_modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Announcement'); // Set title to Bootstrap modal title
                    
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
            var requiredFields = ['title', 'path', 'description'];
            var isValid = true;
            $.each(requiredFields, function(index, field) {
                if (!$.trim($('[name="' + field + '"]').val())) {
                    $('[name="' + field + '"]').parent().parent().addClass('has-error');
                    $('[name="' + field + '"]').next().text('This field is required.');
                    isValid = false;
                }
            });

            if (!isValid) {
                return false;
            }
            }else{
                var requiredFields = ['title', 'path', 'description'];
                var isValid = true;
                $.each(requiredFields, function(index, field) {
                    if (!$.trim($('[name="' + field + '"]').val())) {
                        $('[name="' + field + '"]').parent().parent().addClass('has-error');
                        $('[name="' + field + '"]').next().text('This field is required.');
                        isValid = false;
                    }
                });

                if (!isValid) {
                    return false;
                }
            
            }
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;

            if(save_method == 'add') {
                url = "<?php echo site_url('Blog/blog_add')?>";
            } else {
                url = "<?php echo site_url('Blog/blog_update')?>";
            }

            // ajax adding data to database
            var formData = new FormData( $('#form')[0]);
            // $('#form').serialize()
            $.ajax({
                url : url,
                type: "POST",
                data: formData,
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status) //if success close modal and reload ajax table
                    {
                        // if adding data
                        if(save_method == 'add'){
                            $('#blog_modal_form').modal('hide');
                            reload_table();
                            var stat = 'Announcement Added';
                            success(stat);
                        // if updating data
                        }else{
                            $('#blog_modal_form').modal('hide');
                            reload_table();
                            var stat = 'Announcement Updated';
                            success(stat);
                        }
                    }
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                            
                        }
                        // if (data.inputerror && data.inputerror.length) {
                        //     for (var i = 0; i < data.inputerror.length; i++) {
                        //         $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                        //         $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                        //     }
                        //     }

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
        function delete_blog(id) {
            // console.log(id);
            var modal = deletemodal(function(result) {
                if (result) {
                    // ajax delete data from database
                    $.ajax({
                        url: "<?php echo site_url('Blog/blog_delete')?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('#blog_modal_form').modal('hide');
                            reload_table();
                            var stat = 'Announcement Deleted';
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
        // function deletemodal(callback) {
        // // create a new modal element
        // var modal = $('<div class="modal modal-danger fade" id="modal-danger">\
        //                 <div class="modal-dialog modal-sm">\
        //                     <div class="modal-content">\
        //                     <div class="modal-header">\
        //                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
        //                         <span aria-hidden="true">&times;</span></button>\
        //                         <h4 class="modal-title">Delete Confirmation</h4>\
        //                     </div>\
        //                     <div class="modal-body">\
        //                         <p>Are you sure you want to delete?</p>\
        //                     </div>\
        //                     <div class="modal-footer">\
        //                         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>\
        //                         <button type="button" class="btn btn-danger" id="deleteBtn">Delete</button>\
        //                     </div>\
        //                     </div>\
        //                 </div>\
        //                 </div>');

        // // add the modal to the DOM
        // $('body').append(modal);

        // // show the modal
        // modal.modal('show');

        // // add a click event listener to the delete button
        // $('#deleteBtn').click(function() {
        //     // perform the delete operation
        //     callback(true);
        //     // hide the modal
        //     modal.remove();
        // });

        // return modal;
        // }
        function deletemodal(callback) {
        // Create modal HTML
        var modalHtml = `
            <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Announcement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this announcement?</p>
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

