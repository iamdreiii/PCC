<script type="text/javascript">
        var save_method;
        var table;
        
            $(document).ready(function() {

                table = $('#table').DataTable({
                    "stateSave": true,
                    "searching": true,
                    "processing": true,
                    "serverSide" : true,
                    "lengthMenu": [[10, 25, 50, 100,500,1000], [10, 25, 50, 100, 500, "All"]],
                    "pageLength": 10,
                    "order": [],
                    "ajax": {
                        "url": "<?php echo site_url('Student_subjects/load_students')?>",
                        "type": "POST",
                        "data": function (d) {
                            d.filter_year_level = $('#filter_year_level').val();
                            d.filter_program = $('#filter_program').val();
                        }
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
            var checkboxes = table.column(0).nodes().to$().find(':checkbox');
            checkboxes.prop('checked', this.checked);
            checkboxes.trigger('change');
        });
        $('#filter_year_level').change(function() {
            table.draw(); 
        });
        // Event handler for course filter
        $('#filter_program').change(function() {
            table.draw(); 
        });
        });
        //LOAD FILTER YEAR LEVEL
        $.ajax({
            url: '<?php echo base_url("Student_subjects/get_year_level"); ?>',
            dataType: 'json',
            success: function(year_level) {
                var options = '';
                options += '<option value="">Select Year Level</option>';
                $.each(year_level, function(index, year_level) {
                    options += '<option value="' + year_level.year + '">' + year_level.year + '</option>';
                });
                $('#filter_year_level').html(options);
            }
        });

        //LOAD FILTER PROGRAM
        $.ajax({
            url: '<?php echo base_url("Student_subjects/get_program"); ?>',
            dataType: 'json',
            success: function(program) {
                var options = '';
                options += '<option value="">Select Program/Course</option>';
                $.each(program, function(index, program) {
                    options += '<option value="' + program.course + '">' + program.course + '</option>';
                });
                $('#filter_program').html(options);
            }
        });
        
    
        function add_student()
        {
            save_method = 'add';
            $('#form2')[0].reset(); 
            $('.form-group').removeClass('has-error');
            $('.help-block').empty(); 
            $('#modal_form2').modal('show'); 
            $('.modal-title').text(' Admission Form');
        }

        function edit_student(id)
        {
            save_method = 'update';
            $('#form2')[0].reset();
            $('.form-group').removeClass('has-error'); 
            $('.help-block').empty();

           
            $.ajax({
                url : "<?php echo site_url('Student/student_edit/')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    // PERSONAL INFO
                    $('[name="id"]').val(data.id);
                    $('[name="student_id"]').val(data.student_id);
                    $('[name="fname"]').val(data.fname);
                    $('[name="mname"]').val(data.mname);
                    $('[name="lname"]').val(data.lname);
                    $('[name="extension"]').val(data.extension);
                    $('[name="birthdate"]').val(data.birthdate);
                    $('[name="age"]').val(data.age);
                    $('[name="sex"]').val(data.sex);
                    $('[name="height"]').val(data.height);
                    $('[name="weight"]').val(data.weight);
                    $('[name="birthplace"]').val(data.birthplace);
                    $('[name="citizenship"]').val(data.citizenship);
                    $('[name="religion"]').val(data.religion);
                    $('[name="civil_status"]').val(data.civil_status);
                    $('[name="mobile_no"]').val(data.mobile_no);
                    $('[name="email"]').val(data.email);
                    $('[name="facebook"]').val(data.facebook);
                    // ADDRESS
                    $('[name="address"]').val(data.address);
                    $('[name="city_municipality"]').val(data.city_municipality);
                    $('[name="province"]').val(data.province);
                    $('[name="zip_code"]').val(data.zip_code);
                    // FAMILY BACKROUND
                    $('[name="father"]').val(data.father);
                    $('[name="mother"]').val(data.mother);
                    $('[name="guardian"]').val(data.guardian);
                    $('[name="parent_address"]').val(data.parent_address);
                    $('[name="guardian_address"]').val(data.guardian_address);
                    $('[name="f_occupation"]').val(data.f_occupation);
                    $('[name="m_occupation"]').val(data.m_occupation);
                    $('[name="g_relationship"]').val(data.g_relationship);
                    $('[name="f_contact"]').val(data.f_contact);
                    $('[name="m_contact"]').val(data.m_contact);
                    $('[name="g_contact"]').val(data.g_contact);
                    $('[name="f_birthdate"]').val(data.f_birthdate);
                    $('[name="m_birthdate"]').val(data.m_birthdate);
                    $('[name="g_birthdate"]').val(data.g_birthdate);
                    // FOR WORKING STUDENT
                    $('[name="ws_company"]').val(data.ws_company);
                    $('[name="ws_employer_contact"]').val(data.ws_employer_contact);
                    $('[name="ws_employer"]').val(data.ws_employer);
                    $('[name="ws_company_address"]').val(data.ws_company_address);
                    $('[name="ws_position"]').val(data.ws_position);
                    $('[name="ws_date_started"]').val(data.ws_date_started);
                    // EDUCATIONAL INFO
                    // TERTIARY
                    $('[name="tertiary_school_last_attended"]').val(data.tertiary_school_last_attended);
                    $('[name="tertiary_year_last_attended"]').val(data.tertiary_school_year_last_attended);
                    $('[name="tertiary_school_address"]').val(data.tertiary_school_address);
                    $('[name="tertiary_city"]').val(data.tertiary_city);
                    $('[name="tertiary_province"]').val(data.tertiary_province);
                    // SECONDARY SENIOR
                    $('[name="secondary_school_last_attended"]').val(data.secondary_school_last_attended);
                    $('[name="secondary_year_last_attended"]').val(data.secondary_school_year_last_attended);
                    $('[name="secondary_school_address"]').val(data.secondary_school_address);
                    $('[name="secondary_city"]').val(data.secondary_city);
                    $('[name="secondary_province"]').val(data.secondary_province);
                    // SECONDARY JUNIOR
                    $('[name="secondary_junior_school_last_attended"]').val(data.secondary_junior_school_last_attended);
                    $('[name="secondary_junior_year_last_attended"]').val(data.secondary_junior_school_year_last_attended);
                    $('[name="secondary_junior_school_address"]').val(data.secondary_junior_school_address);
                    $('[name="secondary_junior_city"]').val(data.secondary_junior_city);
                    $('[name="secondary_junior_province"]').val(data.secondary_junior_province);
                    // PRIMARY
                    $('[name="primary_school_last_attended"]').val(data.primary_school_last_attended);
                    $('[name="primary_year_last_attended"]').val(data.primary_school_year_last_attended);
                    $('[name="primary_school_address"]').val(data.primary_school_address);
                    $('[name="primary_city"]').val(data.primary_city);
                    $('[name="primary_province"]').val(data.primary_province);

                    $('[name="program"]').val(data.program);
                    $('[name="year_levels"]').val(data.year_level);
                    $('[name="sem"]').val(data.sem);
                    $('#modal_form2').modal('show');
                    $('.modal-title').text('Edit Student'); 
                    
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
            table.ajax.reload(null,false); 
        }


        function save_student()
        {
            
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();
            var form = $('#form2')[0];
            var formData = new FormData(form);
            if(save_method == 'add') {
            
                var requiredFields = ['student_id', 'fname', 'lname', 'birthdate', 'age', 'sex', 'birthplace', 'citizenship', 'religion', 'civil_status', 'mobile_no', 'email', 'address', 'city_municipality', 'province', 'zip_code', 'sem'];
                var isValid = true;

                // $.each(requiredFields, function(index, field) {
                //     if (!$.trim($('[name="' + field + '"]').val())) {
                //         $('[name="' + field + '"]').parent().parent().addClass('has-error');
                //         $('[name="' + field + '"]').next().text('required.');
                //         isValid = false;

                //         var errorElement = $('[name="' + field + '"]').parent().parent();
                //         var modalContent = $('.modal-content');
                //         modalContent.scrollTop(errorElement.offset().top - modalContent.offset().top + modalContent.scrollTop());
                //     }
                // });
                requiredFields.forEach(field => {
                const fieldValue = $('[name="' + field + '"]').val().trim();
                if (!fieldValue) {
                    const fieldElement = $('[name="' + field + '"]');
                    fieldElement.parent().parent().addClass('has-error');
                    fieldElement.next().text('required.');
                    isValid = false;

                    const errorElement = fieldElement.parent().parent();
                    const modalContent = $('#modal_form2');
                    // const scrollTopPosition = errorElement.offset().top - modalContent.offset().top + modalContent.scrollTop();
                    // modalContent.animate({ scrollTop: scrollTopPosition }, 'slow');
                    modalContent.scrollTop(errorElement.offset().top - modalContent.offset().top + modalContent.scrollTop());
                }
                });




            var email = $('[name="email"]').val();
            $.ajax({
                url : "<?php echo site_url('Student/validate_email')?>",
                type: "POST",
                data: {email: email},
                dataType: "JSON",
                success: function(data) {
                    if (data.status == false) {
                        $('[name="email"]').parent().parent().addClass('has-error');
                        $('[name="email"]').next().text('This email already exists.');
                        isValid = false;

                        
                        // Scroll to the error part in the modal
                        var errorElement = $('[name="email"]').parent().parent();
                        var modalContent = $('#modal_form2');
                        modalContent.scrollTop(errorElement.offset().top - modalContent.offset().top + modalContent.scrollTop());
                    }
                },
                async: false 
            });
            if (!isValid) {
                return false;
            }
            }
            $('#btnSave').text('saving...'); 
            $('#btnSave').attr('disabled',true); 
            var url;

            if(save_method == 'add') {
                url = "<?php echo site_url('Student/student_add')?>";
            } else {
                url = "<?php echo site_url('Student/student_update')?>";
            }
            $.ajax({
                url : url,
                type: "POST",
                // data: $('#form2').serialize(),
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function(data)
                {
                    
                    if(data.status) 
                    {
                        if(save_method == 'add'){
                            $('#modal_form2').modal('hide');
                            reload_table();
                            var stat = 'Student Added';
                            success(stat);
                        }else{
                            $('#modal_form2').modal('hide');
                            reload_table();
                            var stat = 'Student Updated';
                            success(stat);
                        }
                    }
                    else
                    {
                        if (data.inputerror && Array.isArray(data.inputerror)) {
    for (var i = 0; i < data.inputerror.length; i++) {
        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
    }
}

                    }
                    $('#btnSave').text('save'); 
                    $('#btnSave').attr('disabled',false); 


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    
                    if (jqXHR.responseText.includes('Duplicate entry')) {
                        var stat = 'Duplicate Student ID';
                    } else {
                        var stat = 'Updated';
                    }
                    error(stat);
                    $('#btnSave').text('save'); 
                    $('#btnSave').attr('disabled',false);  

                }
            });
        }
        //LOAD COURSES 
        $.ajax({
            url: '<?php echo base_url("Student/get_courses"); ?>',
            dataType: 'json',
            success: function(courses) {
                var options = '';
                options += '<option>Select Course/Program</option>';
                $.each(courses, function(index, course) {
                    options += '<option value="' + course.course + '">' + course.course + '</option>';
                });
                $('#program').html(options);
            }
        });
        // ADD UPDATE CLASS
        $.ajax({
            url: '<?php echo base_url("Student/get_classes"); ?>',
            dataType: 'json',
            success: function(classes) {
                var options = '';
                options += '<option value="none">NONE</option>';
                $.each(classes, function(index, classes) {
                    var yearLevel = '';
                    switch (classes.year_level) {
                        case '1':
                        yearLevel = '1st Year';
                        break;
                        case '2':
                        yearLevel = '2nd Year';
                        break;
                        case '3':
                        yearLevel = '3rd Year';
                        break;
                        case '4':
                        yearLevel = '4th Year';
                        break;
                        default:
                        yearLevel = 'Unknown';
                    }
                    options += '<option value="' + classes.name + '">' + classes.name + ' - ' + yearLevel + '</option>';
                });
                $('#class_id').html(options);
            }
        });
        // GET YEAR LEVEL MODAL
        $.ajax({
            url: '<?php echo base_url("Student/get_year_level"); ?>',
            dataType: 'json',
            success: function(year_level) {
                var options = '';
                options += '<option>Select Year Level</option>';
                $.each(year_level, function(index, year_level) {
                    options += '<option value="' + year_level.year + '">' + year_level.year + '</option>';
                });
                $('#year_levels').html(options);
            }
        });
         
        function delete_student(id) {
            var modal = deletemodal(function(result) {
                if (result) {
                    // ajax delete data from database
                    $.ajax({
                        url: "<?php echo site_url('Student/student_delete')?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('#modal_form2').modal('hide');
                            reload_table();
                            var stat = 'Student Deleted';
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
            var selected = $('input[name="selected[]"]:checked'); 
            var ids = selected.map(function() {
                return this.value;
            }).get(); 
            if (ids.length === 0) {
               
                alert('Please select at least one Student to delete.');
                return false;
            }
            var modal = deletemodal(function(result) {
                if (result) {
                  
                    $.ajax({
                        url: '<?php echo site_url("Student/delete_multiple_students"); ?>',
                        type: 'POST',
                        data: {ids: ids},
                        success: function(response) {
                           
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'Students Deleted';
                            success(stat);
                        },
                        error: function(xhr) {
                           
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
            alert('Please select at least one Student.');
            return;
            }

            $.ajax({
            type: "POST",
            url: "<?php echo site_url('Student/update_class_id'); ?>",
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




        
        
        function deletemodal(callback) {
        // Create modal HTML
        var modalHtml = `
            <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Student/s</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this Student/s?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="delete_confirm">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('body').append(modalHtml);

        $('#delete_modal').modal('show');

        $('#delete_confirm').on('click', function() {
            callback(true);

            $('#delete_modal').modal('hide');
        });

        $('#delete_modal').on('hidden.bs.modal', function() {
            callback(false);
            $(this).remove();
        });
        return $('#delete_modal');
    }

    </script>

<?php $this->load->view('helpers/toastr');?>