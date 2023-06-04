
<script type="text/javascript">

    
    
    var save_method; // for save method string
    var tables = [];
   

    $(document).ready(function() {
        // Initialize each DataTable
        initializeDataTable('table1', "<?php echo site_url('Prerequisite/sub1_list')?>");
        initializeDataTable('table2', "<?php echo site_url('Prerequisite/sub2_list')?>");
        initializeDataTable('table3', "<?php echo site_url('Prerequisite/sub3_list')?>");
        initializeDataTable('table4', "<?php echo site_url('Prerequisite/sub4_list')?>");
        initializeDataTable('table5', "<?php echo site_url('Prerequisite/sub5_list')?>");
        initializeDataTable('table6', "<?php echo site_url('Prerequisite/sub6_list')?>");
        initializeDataTable('table7', "<?php echo site_url('Prerequisite/sub7_list')?>");
        initializeDataTable('table8', "<?php echo site_url('Prerequisite/sub8_list')?>");




        // Function to initialize a DataTable
        function initializeDataTable(id, url) {
            var table = $('#' + id).DataTable({
                paging: false,
                lengthChange: false,
                searching: false,
                ordering: false,
                info: false,
                autoWidth: false,
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    url: url,
                    type: "POST",
                    "data": function (d) {
                            d.filter_program = $('#filter_program').val();
                        }
                },
                columnDefs: [{
                    targets: [0],
                    orderable: false
                }]
            });

            tables.push(table);
        }


        // additional logic and event handlers here
        $.ajax({
            url: '<?php echo base_url("Prerequisite/get_program"); ?>',
            dataType: 'json',
            success: function(program) {
                var options = '';
                options += '<option value="">Select Program/Course</option>';
                $.each(program, function(index, program) {
                    options += '<option value="' + program.id + '">' + program.description + '</option>';
                });
                $('#filter_program').html(options);
                
            }
        });

        $('#filter_program').change(function() {
            reloadTables();
        });

    });

    // Function to handle editing a prerequisite
    

        // Function to reload all tables
        function reloadTables() {
            program_id = $('#filter_program').val();
            var selectedProgramDescription = $('#filter_program option:selected').text();
            $('#course_id').text(selectedProgramDescription);
                tables.forEach(function(table) {
                    table.ajax.reload(null, false);
                });
                
        }

        // Function to save the form data
        function save() {
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();

            $('#btnSave').text('saving...');
            $('#btnSave').attr('disabled', true);
            var url;

            if (save_method == 'add') {
                url = "<?php echo site_url('Prereq/prereq_add')?>";
            } else {
                url = "<?php echo site_url('Prereq/prereq_update')?>";
            }

            $.ajax({
                url: url,
                type: "POST",
                data: $('#form1').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        $('#modal_form1').modal('hide');
                        success(data.message);
                        reloadTables();
                    } else {
                        for (var i = 0; i < data.inputerror.length; i++) {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                        }
                    }
                    $('#btnSave').text('Save');
                    $('#btnSave').attr('disabled', false);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var stat = 'Error adding / update data';
                    error(stat);
                    $('#btnSave').text('Save');
                    $('#btnSave').attr('disabled', false);
                }
            });
        }
        function edit_prereq(id) {
            save_method = 'update';
            $('#form1')[0].reset(); // Reset form on modals
            $('.form-group').removeClass('has-error'); // Clear error class
            $('.help-block').empty(); // Clear error string

            // Ajax Load data from server
            $.ajax({
                url: "<?php echo site_url('Prerequisite/prereq_edit1')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                $('[name="id"]').val(data.id);
                $('[name="subjects1"]').val(data.subcode);
                $('#modal_form1').modal('show'); // Show bootstrap modal
                $('.modal-title').text('Update Subject Prerequisite'); // Set title to Bootstrap modal title
                program_id = $('#filter_program').val(); // Assign program_id value to the global variable
                loadsubjects(program_id);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                var stat = 'Error Loading Data';
                error(stat);
                }
            });
        }

        function loadsubjects(program_id) {
            $.ajax({
                url: '<?php echo base_url("Prerequisite/get_subjects1"); ?>',
                type: 'POST', // Change the request type to POST
                dataType: 'json',
                data: { program_id: program_id }, // Pass selected program_id as a parameter
                success: function(subjects) {
                var options = '';
                options += '<option value="none">none</option>';
                $.each(subjects, function(index, subject) { // Change the variable name to subject
                    options += '<option value="' + subject.subcode + '">' + subject.subcode + ' - ' + subject.description + '</option>';
                });
                $('#subjects1').html(options);
                }
            });
        }



</script>
