<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3><i class="glyphicon glyphicon-user"></i> <span class="modal-title"></span></h3>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form">
                        <input type="hidden" value="" name="id"/>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="fname">First Name <b style="color:red;">*</b></label>
                                    <input name="fname" placeholder="First Name" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label for="mname">Middle Name</label>
                                    <input name="mname" placeholder="Middle Name" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="lname">Last Name <b style="color:red;">*</b></label>
                                    <input name="lname" placeholder="Last Name" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label for="extensions">Extension ex: Sr, Jr</label>
                                    <input name="extensions" placeholder="Extension" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="gender">Gender <b style="color:red;">*</b></label>
                                    <select name="gender" class="form-control" >
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label for="date_of_birth">Birthday</label>
                                    <input name="date_of_birth" class="form-control" type="date">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="email">Email <b style="color:red;">*</b></label>
                                    <input name="email" placeholder="Email" class="form-control" type="email">
                                    <span id="email-error"  class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label for="password">Password <b style="color:red;">*</b></label>
                                    <input name="password" placeholder="Password" class="form-control" type="password">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="phone_number">Phone Number <b style="color:red;">*</b></label>
                                    <input name="phone_number" placeholder="09**********" class="form-control" type="text" pattern="09123456789">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label for="address">Address <b style="color:red;">*</b></label>
                                    <textarea name="address" class="form-control" id="address"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="course">Course/Program <b style="color:red;">*</b></label>
                                    <select name="course" id="course" class="form-control">
                                        <option value="">Select a course</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-xs-6">
                                    <label for="year_level">Year Level</label>
                                    <select name="year_level" id="year_level" class="form-control">
                                        <option value="">Select Year Level</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="enrollment_status">Enrollment Status</label>
                                    <select name="enrollment_status" id="enrollment_status" class="form-control">
                                        <option value="">Select a Enrollment Status</option>
                                        <option value="Enrolled">Enrolled</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Irregular">Irregular</option>
                                        <option value="Graduate">Graduate</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ADD/UPDATE CLASS MODAL -->
<div class="modal fade" id="class_modal" tabindex="-1" role="dialog" aria-labelledby="class_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="class_modal_label">Select Class</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="class_form">
            <div class="form-group">
              <label for="class_id">Class:</label>
              <select class="form-control" id="class_id" name="class_id">
                  <option value="">Select Class</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="save_class_btn">Save</button>
        </div>
      </div>
    </div>
  </div>

<style>
    .text-on-pannel {
  background: #fff none repeat scroll 0 0;
  height: auto;
  margin-left: 20px;
  padding: 3px 5px;
  position: absolute;
  margin-top: -47px;
  border: 1px solid #337ab7;
  border-radius: 8px;
}

.panel {
  /* for text on pannel */
  margin-top: 27px !important;
}

.panel-body {
  padding-top: 30px !important;
}
</style>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <!-- Admission Form Modal -->
  <div class="modal fade" id="modal_form2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3><i class="glyphicon glyphicon-user"></i> <span class="modal-title"></span></h3>
                </div>
                <div class="modal-body">
                <form action="#" id="form2">
                        <input type="hidden" value="" name="id"/>
                        <div class="form-body">
                            
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">Personal Information</h4>
                                    <div class="col-xs-3">
                                        <input name="lname" placeholder="Surname" class="form-control" type="text">
                                        <span class="help-block"></span>
                                        <label for="lname">Surname <b style="color:red;">*</b></label>
                                    </div>
                                    <div class="col-xs-4">
                                        <input name="fname" placeholder="Given Name" class="form-control" type="text">
                                        <span class="help-block"></span>
                                        <label for="fname">Given Name <b style="color:red;">*</b></label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="mname" placeholder="Middle Name" class="form-control" type="text">
                                        <span class="help-block"></span>
                                        <label for="mname">Middle Name</label>
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="extension" placeholder="Extension" class="form-control" type="text">
                                        <span class="help-block"></span>
                                        <label for="extension">Extension</label>
                                    </div>
                                </div><br>
                            </div>
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                    <div class="col-xs-3">
                                        <input name="birthdate" class="form-control" type="date">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="age" placeholder="Age" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <select name="sex" class="form-control"  id="">
                                            <option value="">Gender</option>
                                            <option value="">Male</option>
                                            <option value="">Female</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="height" placeholder="Height" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="weight" placeholder="Weight (kg)" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                
                                    <div class="col-xs-5">
                                        <input name="birthplace" placeholder="Birthplace" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <select name="citizenship"  class="form-control" id="">
                                            <option value="">Citizenship</option>
                                            <option value="">Filipino</option>
                                            <option value="">American</option>
                                            <option value="">others</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                        <input name="religion" placeholder="Religion" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                
                                    <div class="col-xs-2">
                                        <select name="civilstatus"  class="form-control" id="">
                                            <option value="">Civil Status</option>
                                            <option value="">Single</option>
                                            <option value="">Married</option>
                                            <option value="">Divorced</option>
                                            <option value="">Separated</option>
                                            <option value="">Widowed</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="mobileno" placeholder="Mobile No. " class="form-control" type="text" pattern="09123456789">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                        <input name="email" placeholder="Email " class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                        <input name="facebook" placeholder="Facebook " class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">Address</h4>
                                    <div class="col-xs-4">
                                        <input name="address" placeholder="Permanent Address/Current/Street" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="city" placeholder="City Municipality" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="province" placeholder="Province" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="zip" placeholder="Zip Code" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">Family background</h4>
                                <!-- father -->
                                    <div class="col-xs-4">
                                        <label for="">Name</label>
                                        <input name="father" placeholder="Father's Name" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="">Occupation</label>
                                        <input name="foccupation" placeholder="Occupation" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-2">
                                        <label for="">Contact</label>
                                        <input name="fcontact" placeholder="Contact #" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="">Birthday</label>
                                        <input name="fbirthday" placeholder="Birthday" class="form-control" type="date">
                                        <span class="help-block"></span>
                                    </div>  
                                <!-- Mother -->
                                    <div class="col-xs-4">
                                        <input name="mother" placeholder="Mother's Name" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="moccupation" placeholder="Occupation" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="mcontact" placeholder="Contact #" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="mbirthday" placeholder="Birthday" class="form-control" type="date">
                                        <span class="help-block"></span>
                                    </div>  
                                <!-- Guardian -->
                                    <div class="col-xs-4">
                                        <input name="guardian" placeholder="Guardian's Name" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="goccupation" placeholder="Occupation" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input name="gcontact" placeholder="Contact #" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <input name="gbirthday" placeholder="Birthday" class="form-control" type="date">
                                        <span class="help-block"></span>
                                    </div>  
                                <!-- addres -->
                                    <div class="col-xs-6">
                                        <input name="paddress" placeholder="Parent's Address" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <input name="mname" placeholder="Guardian Address" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div> 
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">For Working Students</h4>
                                    <div class="col-xs-4">
                                        <label for="">Name of the Company</label>
                                        <input name="fname" placeholder="Name of the Company" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Position</label>
                                        <input name="mname" placeholder="Position" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Date Started</label>
                                        <input name="mname" placeholder="Province" class="form-control" type="date">
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="">Name of Employer</label>
                                        <input name="fname" placeholder="Name of Employer" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Contact</label>
                                        <input name="mname" placeholder="City Municipality" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Office Address</label>
                                        <input name="mname" placeholder="Address" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div><br>

                            <!-- EDUCATIOn -->
                            <h4>Educational Information</h4>
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">Tertiary</h4>
                                    <div class="col-xs-8">
                                        <label for="">School Last Attended</label>
                                        <input name="tertiary_school_last_attended" placeholder="School Last Attended" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Year Last Attended</label>
                                        <select id="tertiary_year_last_attended" class="form-control" onchange="onChangeYearAndMonth(this)"></select>
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="">School Address</label>
                                        <input name="tertiary_school_address" placeholder="School Address" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">City/Municipality</label>
                                        <input name="tertiary_city" placeholder="City/Municipality" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Province</label>
                                        <input name="tertiary_province" placeholder="Province" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">Secondary Senior High School</h4>
                                    <div class="col-xs-8">
                                        <label for="">School Last Attended</label>
                                        <input name="secondary_senior_school_last_attended" placeholder="School Last Attended" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Year Last Attended</label>
                                        <select id="secondary_senior_year_last_attended" class="form-control" onchange="onChangeYearAndMonth(this)"></select>
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="">School Address</label>
                                        <input name="secondary_senior_school_address" placeholder="School Address" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">City/Municipality</label>
                                        <input name="secondary_senior_city" placeholder="City/Municipality" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Province</label>
                                        <input name="secondary_senior_province" placeholder="Province" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">Secondary - Junior High School</h4>
                                    <div class="col-xs-8">
                                        <label for="">School Last Attended</label>
                                        <input name="secondary_junior_school_last_attended" placeholder="School Last Attended" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Year Last Attended</label>
                                        <select id="secondary_junior_year_last_atended" class="form-control" onchange="onChangeYearAndMonth(this)"></select>
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="">School Address</label>
                                        <input name="secondary_junior_school_address" placeholder="School Address" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">City/Municipality</label>
                                        <input name="secondary_junior_city" placeholder="City/Municipality" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Province</label>
                                        <input name="secondary_junior_province" placeholder="Province" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">Primary</h4>
                                    <div class="col-xs-8">
                                        <label for="">School Last Attended</label>
                                        <input name="primary_school_last_attended" placeholder="School Last Attended" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Year Last Attended</label>
                                        <select id="primary_year_last_attended" class="form-control" onchange="onChangeYearAndMonth(this)"></select>
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="">School Address</label>
                                        <input name="primary_school_address" placeholder="School Address" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">City/Municipality</label>
                                        <input name="primary_city" placeholder="City/Municipality" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="">Province</label>
                                        <input name="primary_province" placeholder="Province" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="row panel-body">
                                <h4 class="text-on-pannel text-primary">Program</h4>
                                <!-- father -->
                                    <div class="col-xs-4">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="">Programdddd</label>
                                        <select name="fname"  class="form-control">
                                            <option value="">BPA</option>
                                            <option value="">BSE</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-xs-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                </div>
                </div>
            </div>
        </div>
  </div>
  <script type="text/javascript">
    const yearDropdownField = $("#yearDropdownField");
    const yearDropdownField1 = $("#yearDropdownField1");
    const yearDropdownField2 = $("#yearDropdownField2");
    const yearDropdownField3 = $("#yearDropdownField3");

    window.onload = function () {

      populateYearDropdown();
      populateYearDropdown1();
      populateYearDropdown2();
      populateYearDropdown3();

      // Initially, we make hidden Date Dropdown Div.
      $("#dateDropdownDiv").toggle();

      // Add click event on selectedDateField and called toggle method on dateDropdownDiv
      $("#selectedDateField").click(function () {
        $("#dateDropdownDiv").toggle();
      });
    };

    function populateYearDropdown() {
      const currentYear = new Date().getFullYear();
      for (let i = currentYear; i >= 1950; i--) {
        const option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        yearDropdownField.append(option);
      }
    }
    function populateYearDropdown1() {
      const currentYear = new Date().getFullYear();
      for (let i = currentYear; i >= 1950; i--) {
        const option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        yearDropdownField1.append(option);
      }
    }
    function populateYearDropdown2() {
      const currentYear = new Date().getFullYear();
      for (let i = currentYear; i >= 1950; i--) {
        const option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        yearDropdownField2.append(option);
      }
    }
    function populateYearDropdown3() {
      const currentYear = new Date().getFullYear();
      for (let i = currentYear; i >= 1950; i--) {
        const option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        yearDropdownField3.append(option);
      }
    }

    
    function onChangeYearAndMonth($event) {
      this.populateDateDropdown();
    }

    function onOkClick() {
      const y = yearDropdownField.val();
      const m = monthDropdownField.val();
      const d = dateDropdownField.val();

      // make date object by passing year, month and date value
      const date = new Date(y, m, d);

      // set date object into readonly input field
      selectedDateField.val(date.toLocaleDateString());

      // after set date, hide date dropdown div
      $("#dateDropdownDiv").hide();
    }

    function onNowClick() {
      const date = new Date(); // get date object

      // set values
      yearDropdownField.val(date.getFullYear());
      monthDropdownField.val(date.getMonth());
      dateDropdownField.val(date.getDate());

      // set date value into input field
      selectedDateField.val(date.toLocaleDateString());
      
      // hide date dropdown div
      $("#dateDropdownDiv").hide();
    }
</script>