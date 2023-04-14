<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->


<div class="modal fade" id="blog_modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#" id="form">
                            <input type="hidden" value="" name="id"/>
                            <div class="form-group">
                                <label for="school_year">Title <b style="color:red;">*</b></label>
                                    <input name="title" placeholder="Title" class="form-control" type="text">
                                    <span class="help-block"></span>
                                
                            </div>
                            <div class="form-group">
                                <label  for="path">File <b style="color:red;">*</b></label>
                                    <input type="file" name="path" id="path" class="form-control">
                                    <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                    <!-- <textarea name="description" id="description" placeholder="Enter Announcement Details Here..." class="form-control" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->
                                    <textarea  name="description" id="description" cols="30" rows="20">Enter Details Here...</textarea>
                                    <!-- <div id="description" name="description"></div> -->
                                    <span class="help-block"></span>
                                    <script>
                                    $('#description').summernote({height: 300});
                                    </script>
                            </div>
                </form>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-center" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary pull-center"><i class="glyphicon glyphicon-save"></i> Save</button>
      </div>
    </div>
  </div>
</div>