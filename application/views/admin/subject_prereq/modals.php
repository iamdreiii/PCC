<!-- <div class="modal fade" id="modal_form" role="dialog" tabindex="-1">
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
                                <div class="col-xs-6">
                                <label for="">Course Code</label>
                                    <input name="subcode" placeholder="Subject Code" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label for="">Units</label>
                                    <input name="units" placeholder="Units" class="form-control" type="number">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="">Description</label>
                                    <input name="description" placeholder="Description" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="">Choose Subject Prerequisite</label>
                                    <select id="subjects" name="subjects" class="form-control">
                                        <option>Select Prerequisite Subject</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                    </div>
                </form>
            </div><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-center" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary pull-center"><i class="glyphicon glyphicon-save"></i> Update</button>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade" id="modal_form1" role="dialog" tabindex="-1">
    <div class="modal-dialog " role="document" style="width:500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3><i class="glyphicon glyphicon-file"></i> <span class="modal-title"></span></h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form1">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="">Choose Subject Prerequisite</label>
                                    <select id="subjects1" name="subjects1" class="form-control">
                                        <option>Select Prerequisite Subject</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                    </div>
                </form>
            </div><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-center" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary pull-center"><i class="glyphicon glyphicon-save"></i> Update</button>
                <!-- <button type="button" id="btnSave" onclick="add()" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>