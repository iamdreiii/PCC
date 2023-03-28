<div class="modal fade" id="modal_form" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document" style="width:500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3><i class="glyphicon glyphicon-file"></i> <span class="modal-title"></span></h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input name="subcode" placeholder="Subject Code" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input name="description" placeholder="Description" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input name="units" placeholder="Units" class="form-control" type="number">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <select name="year_level" class="form-control">
                                        <option>Select Year Level</option>
                                        <option value="1">First Year</option>
                                        <option value="2">Second Year</option>
                                        <option value="3">Third Year</option>
                                        <option value="4">Fourth Year</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <select name="semester" class="form-control">
                                        <option>Select Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="2">Second Semester</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <select name="program_id" class="form-control" id="">
                                        <option>Select Program</option>
                                        <option value="1">BSE</option>
                                        <option value="2">BPA</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                    </div>
                </form>
            </div><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-center" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary pull-center"><i class="glyphicon glyphicon-save"></i> Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
