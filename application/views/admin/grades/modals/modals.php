<!-- ADD/UPDATE CLASS MODAL -->
<div class="modal fade" id="student_loads_modal" tabindex="-1" role="dialog" aria-labelledby="class_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="class_modal_label">Select Subjects Loads</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="class_form">
                    <table id="subject_ids" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th width="2%"><input type="checkbox" id="select-all"></th>
                                <th>COURSECODE</th>
                                <th>Description</th>
                                <th>Units</th>
                                <th>Pre-Req</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="save_student_loads_btn">Save</button>
            </div>
        </div>
    </div>
</div>

