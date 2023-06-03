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
                        "url": "<?php echo site_url('Student_grades/load_students')?>",
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

       
    </script>

<?php $this->load->view('helpers/toastr');?>