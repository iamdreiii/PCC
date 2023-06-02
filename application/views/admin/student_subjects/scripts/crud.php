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
            url: '<?php echo base_url("Student/get_year_level"); ?>',
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
            url: '<?php echo base_url("Student/get_program"); ?>',
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


        function reload_table()
        {
            table.ajax.reload(null,false); 
        }

        $.ajax({
            url: '<?php echo base_url("Student_loads/get_subjects_first_year_bpa"); ?>',
            dataType: 'json',
            success: function(subjects) {
                var table1 = '<table>';
                table1 += '<thead><tr><th><input type="checkbox" id="select-all"></th><th>COURSECODE</th><th>Description</th><th>Units</th><th>Pre-Req</th></tr></thead><tbody>';
                var isFirstSemester = true; // flag to track if it's the first semester
                $.each(subjects, function(index, subject) {
                    if (subject.semester == 1 && isFirstSemester) {
                        table1 += '<tr><td colspan="5" style="text-align: center;"><strong><u>1st Sem</u></strong></td></tr>';
                        isFirstSemester = false;
                    }
                    if (subject.semester == 2 && !isFirstSemester) {
                        table1 += '<tr><td colspan="5" style="text-align: center;"><strong><u>2nd Sem</u></strong></td></tr>';
                        isFirstSemester = true;
                    }
                    table1 += '<tr>';
                    table1 += '<td><input type="checkbox" name="subject_ids[]" value="' + subject.id + '"></td>';
                    table1 += '<td>' + subject.subcode + '</td>';
                    table1 += '<td>' + subject.description + '</td>';
                    table1 += '<td>' + subject.units + '</td>';
                    table1 += '<td>' + subject.prereq + '</td>';
                    table1 += '</tr>';
                });
                table1 += '</tbody></table>';
                $('#subject_ids').html(table1);

                // Add select all checkbox functionality
                $(document).on('click', '#select-all', function() {
                    $('#subject_ids tbody input[type="checkbox"]').prop('checked', $(this).prop('checked'));
                });

            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });
        
        $(document).ready(function() {
        $('#update_btn').click(function() {
            var selectedUsers = $('input[name="selected[]"]:checked');
            if (selectedUsers.length === 0) {
            alert('Please select at least one user.');
            } else {
            $('#student_loads_modal').modal('show');
            }
        });
        $('#save_student_loads_btn').click(function() {
                var subject_ids = [];
                var subcodes = [];
                $('input[name="subject_ids[]"]:checked').each(function() {
                    subject_ids.push($(this).val());
                    subcodes.push($(this).closest('tr').find('td:eq(1)').text());
                });
                var user_ids = $('input[name="selected[]"]:checked').map(function() {
                    return this.value;
                }).get();

                if (subject_ids.length === 0) {
                    alert('Please select at least one subject.');
                    return;
                }
                if (user_ids.length === 0) {
                    alert('Please select at least one user.');
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Student_loads/add_student_loads'); ?>",
                    data: {subject_ids: subject_ids, subcodes: subcodes, user_ids: user_ids},
                    success: function(response) {
                        reload_table();
                        $('input[name="subject_ids[]"]:checked').prop('checked', false);
                        $('#select-all').prop('checked', false);
                        var stat = response;
                        success(stat);
                    }
                });

                $('#student_loads_modal').modal('hide');
        });


        });

    </script>

<?php $this->load->view('helpers/toastr');?>