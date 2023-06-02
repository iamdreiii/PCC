<div class="modal fade" id="program_modal   " role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document" style="width:500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3><i class="glyphicon calendar"></i> <span class="modal-title"></span></h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                            <div class="row">
                                <label class="col-xs-3" for="position">Abbreviation <b style="color:red;">*</b></label>
                                <div class="col-xs-8">
                                    <input name="course" placeholder="ex: BSE, BPA" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-xs-3" for="position">Description <b style="color:red;">*</b></label>
                                <div class="col-xs-8">
                                    <input name="description" placeholder="ex: Bachelor of Public Administration" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                    </div>
                </form>
            </div><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-center" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                <button type="button" id="btnSave" onclick="save_program()" class="btn btn-primary pull-center"><i class="glyphicon glyphicon-save"></i> Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


