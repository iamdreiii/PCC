<div class="modal fade" id="blog_modal_form" role="dialog" tabindex="-1">
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
                                <label class="col-xs-3" for="school_year">Title <b style="color:red;">*</b></label>
                                <div class="col-xs-8">
                                    <input name="title" placeholder="Title" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xs-3" for="path">File <b style="color:red;">*</b></label>
                                <div class="col-xs-8">
                                    <input type="file" name="path" id="path" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xs-3" for="status">Description <b style="color:red;">*</b></label>
                                <div class="col-xs-8">
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
