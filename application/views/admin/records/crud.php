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
                    "url": "<?php echo site_url('Records/user_list')?>",
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
        });
        
    </script>

