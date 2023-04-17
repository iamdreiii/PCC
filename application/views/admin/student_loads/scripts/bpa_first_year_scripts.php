<script type="text/javascript" src="<?=base_url()?>assets/script/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
        var save_method;
        var table;
        var table1;
        
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
                    "url": "<?php echo site_url('Student_loads/bpa_first_year_student_list')?>",
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
            var checkboxes = table.column(0).nodes().to$().find(':checkbox');
            checkboxes.prop('checked', this.checked);
            checkboxes.trigger('change');
    });
        });
        
    
        function reload_table()
        {
            table.ajax.reload(null,false); 
        }
        

        function delete_user(id) {
            var modal = deletemodal(function(result) {
                if (result) {
                    // ajax delete data from database
                    $.ajax({
                        url: "<?php echo site_url('User/user_delete')?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('#modal_form2').modal('hide');
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
            var selected = $('input[name="selected[]"]:checked'); 
            var ids = selected.map(function() {
                return this.value;
            }).get(); 
            if (ids.length === 0) {
               
                alert('Please select at least one user to delete.');
                return false;
            }
            var modal = deletemodal(function(result) {
                if (result) {
                  
                    $.ajax({
                        url: '<?php echo site_url("User/delete_multiple"); ?>',
                        type: 'POST',
                        data: {ids: ids},
                        success: function(response) {
                           
                            $('#modal_form').modal('hide');
                            reload_table();
                            var stat = 'Users Deleted';
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




        
        // TOASTR
        
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