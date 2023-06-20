<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
    }
	public function index()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
        $page = 'index';
           if(!file_exists(APPPATH.'views/admin/student/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/student/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    public function get_year_level()
    {
        $year_level = $this->Student_model->get_year_level();
        echo json_encode($year_level);
    }

    public function get_program()
    {
        $year_level = $this->Student_model->get_program();
        echo json_encode($year_level);
    }
    
    public function get_courses()
    {
        $courses = $this->Student_model->get_courses();
        echo json_encode($courses);
    }

    public function get_classes()
    {
        $classes = $this->Student_model->get_classes();
        echo json_encode($classes);
    }

    public function delete_multiple_students() {
        $ids = $this->input->post('ids');
        $this->Student_model->delete_multiple_students($ids); // call a model method to delete the selected rows
        echo 'success'; // return a response to the AJAX request
    }

    public function student_delete($id)
    {
        $this->Student_model->delete_student($id);
        echo json_encode(array("status" => TRUE));
    }

    public function update_class_id() 
    {
        $class_id = $this->input->post('class_id');
        $user_ids = $this->input->post('user_ids');
        $result = $this->Student_model->update_class_id($class_id, $user_ids);
        if ($result) {
          echo 'Class ID updated successfully.';
        } else {
          echo 'Error updating Class ID.';
        }
    }





    public function validate_email()
    {
        $email = $this->input->post('email');
        $result = $this->Student_model->validate_email($email);
        if ($result) {
            // Email already exists in database
            $response['status'] = false;
        } else {
            // Email is available
            $response['status'] = true;
        }
        echo json_encode($response);
    }

    public function student_list()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $year_level = $this->input->post('filter_year_level'); 
        $program = $this->input->post('filter_program'); 
        if (!empty($year_level) || !empty($program) || $year_level != null || $program != null) {
            $list = $this->Student_model->get_all_student_search($search, $start, $length, $program, $year_level);
        } else {
            $list = $this->Student_model->get_all_student_search($search, $start, $length);
        }
        
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_student('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

            $data[] = $row;
        }
        $filteredCount = $this->Student_model->count_filtered();
        $totalCount = $this->Student_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
        
    }

    public function student_add()
    {
        $inputData = $this->input->post('input');

        // $school_id = 'PCC'.date('y').'-'.rand(0,10000);
        $data = array(
            // PERSONAL INFO
            'student_id' => $this->input->post('student_id'),
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'birthdate' => $this->input->post('birthdate'),
            'age' => $this->input->post('age'),
            'sex' => $this->input->post('sex'),
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
            'birthplace' => $this->input->post('birthplace'),
            'citizenship' => $this->input->post('citizenship'),
            'religion' => $this->input->post('religion'),
            'civil_status' => $this->input->post('civil_status'),
            'mobile_no' => $this->input->post('mobile_no'),
            'email' => $this->input->post('email'),
            'facebook' => $this->input->post('facebook'),
            'address' => $this->input->post('address'),
            'city_municipality' => $this->input->post('city_municipality'),
            'province' => $this->input->post('province'),
            'zip_code' => $this->input->post('zip_code'),
            // FAMILY BACKGROUND
            'father' => $this->input->post('father'),
            'mother' => $this->input->post('mother'),
            'guardian' => $this->input->post('guardian'),
            'f_occupation' => $this->input->post('f_occupation'),
            'm_occupation' => $this->input->post('m_occupation'),
            'g_relationship' => $this->input->post('g_relationship'),
            'f_contact' => $this->input->post('f_contact'),
            'm_contact' => $this->input->post('m_contact'),
            'g_contact' => $this->input->post('g_contact'),
            'f_birthdate' => $this->input->post('f_birthdate'),
            'm_birthdate' => $this->input->post('m_birthdate'),
            'g_birthdate' => $this->input->post('g_birthdate'),
            'parent_address' => $this->input->post('parent_address'),
            'guardian_address' => $this->input->post('guardian_address'),
            // FOR WORKING STUDENT
            'ws_company' => $this->input->post('ws_company'),
            'ws_position' => $this->input->post('ws_position'),
            'ws_date_started' => $this->input->post('ws_date_started'),
            'ws_employer' => $this->input->post('ws_employer'),
            'ws_employer_contact' => $this->input->post('ws_employer_contact'),
            'ws_company_address' => $this->input->post('ws_company_address'),
            // EDUCATIONAL INFORMATION
            // TERTIARY
            'tertiary_school_last_attended' => $this->input->post('tertiary_school_last_attended'),
            'tertiary_school_year_last_attended' => $this->input->post('tertiary_year_last_attended'),
            'tertiary_school_address' => $this->input->post('tertiary_school_address'),
            'tertiary_city' => $this->input->post('tertiary_city'),
            'tertiary_province' => $this->input->post('tertiary_province'),
            // SECONDARY SENIOR
            'secondary_school_last_attended' => $this->input->post('secondary_school_last_attended'),
            'secondary_school_year_last_attended' => $this->input->post('secondary_year_last_attended'),
            'secondary_school_address' => $this->input->post('secondary_school_address'),
            'secondary_city' => $this->input->post('secondary_city'),
            'secondary_province' => $this->input->post('secondary_province'),
            // SECONDARY JUNIOR
            'secondary_junior_school_last_attended' => $this->input->post('secondary_junior_school_last_attended'),
            'secondary_junior_school_year_last_attended' => $this->input->post('secondary_junior_year_last_attended'),
            'secondary_junior_school_address' => $this->input->post('secondary_junior_school_address'),
            'secondary_junior_city' => $this->input->post('secondary_junior_city'),
            'secondary_junior_province' => $this->input->post('secondary_junior_province'),
            // PRIMARY
            'primary_school_last_attended' => $this->input->post('primary_school_last_attended'),
            'primary_school_year_last_attended' => $this->input->post('primary_year_last_attended'),
            'primary_school_address' => $this->input->post('primary_school_address'),
            'primary_city' => $this->input->post('primary_city'),
            'primary_province' => $this->input->post('primary_province'),

            'program' => $this->input->post('program'),
            'sem' => $this->input->post('sem'),
            'status' => $this->input->post('status'),
            'transferee' => $this->input->post('transferee'),
            'remarks' => $inputData,
            'date_enrolled' =>  $this->input->post('date_enrolled'),
            'year_level' => $this->input->post('year_levels'),
            'date_created' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->Student_model->add_student($data);
        echo json_encode(array("status" => TRUE));
    }

    public function student_edit($id)
    {
        $data = $this->Student_model->get_student($id);
        echo json_encode($data);
    }

    public function student_update()
    {
        $inputData = $this->input->post('input');

        $data = array(
            'student_id' => $this->input->post('student_id'),
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'birthdate' => $this->input->post('birthdate'),
            'age' => $this->input->post('age'),
            'sex' => $this->input->post('sex'),
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
            'birthplace' => $this->input->post('birthplace'),
            'citizenship' => $this->input->post('citizenship'),
            'religion' => $this->input->post('religion'),
            'civil_status' => $this->input->post('civil_status'),
            'mobile_no' => $this->input->post('mobile_no'),
            'email' => $this->input->post('email'),
            'facebook' => $this->input->post('facebook'),
            'address' => $this->input->post('address'),
            'city_municipality' => $this->input->post('city_municipality'),
            'province' => $this->input->post('province'),
            'zip_code' => $this->input->post('zip_code'),
            // FAMILY BACKGROUND
            'father' => $this->input->post('father'),
            'mother' => $this->input->post('mother'),
            'guardian' => $this->input->post('guardian'),
            'f_occupation' => $this->input->post('f_occupation'),
            'm_occupation' => $this->input->post('m_occupation'),
            'g_relationship' => $this->input->post('g_relationship'),
            'f_contact' => $this->input->post('f_contact'),
            'm_contact' => $this->input->post('m_contact'),
            'g_contact' => $this->input->post('g_contact'),
            'f_birthdate' => $this->input->post('f_birthdate'),
            'm_birthdate' => $this->input->post('m_birthdate'),
            'g_birthdate' => $this->input->post('g_birthdate'),
            'parent_address' => $this->input->post('parent_address'),
            'guardian_address' => $this->input->post('guardian_address'),
            // FOR WORKING STUDENT
            'ws_company' => $this->input->post('ws_company'),
            'ws_position' => $this->input->post('ws_position'),
            'ws_date_started' => $this->input->post('ws_date_started'),
            'ws_employer' => $this->input->post('ws_employer'),
            'ws_employer_contact' => $this->input->post('ws_employer_contact'),
            'ws_company_address' => $this->input->post('ws_company_address'),
            // EDUCATIONAL INFORMATION
            // TERTIARY
            'tertiary_school_last_attended' => $this->input->post('tertiary_school_last_attended'),
            'tertiary_school_year_last_attended' => $this->input->post('tertiary_year_last_attended'),
            'tertiary_school_address' => $this->input->post('tertiary_school_address'),
            'tertiary_city' => $this->input->post('tertiary_city'),
            'tertiary_province' => $this->input->post('tertiary_province'),
            // SECONDARY SENIOR
            'secondary_school_last_attended' => $this->input->post('secondary_school_last_attended'),
            'secondary_school_year_last_attended' => $this->input->post('secondary_year_last_attended'),
            'secondary_school_address' => $this->input->post('secondary_school_address'),
            'secondary_city' => $this->input->post('secondary_city'),
            'secondary_province' => $this->input->post('secondary_province'),
            // SECONDARY JUNIOR
            'secondary_junior_school_last_attended' => $this->input->post('secondary_junior_school_last_attended'),
            'secondary_junior_school_year_last_attended' => $this->input->post('secondary_junior_year_last_attended'),
            'secondary_junior_school_address' => $this->input->post('secondary_junior_school_address'),
            'secondary_junior_city' => $this->input->post('secondary_junior_city'),
            'secondary_junior_province' => $this->input->post('secondary_junior_province'),
            // PRIMARY
            'primary_school_last_attended' => $this->input->post('primary_school_last_attended'),
            'primary_school_year_last_attended' => $this->input->post('primary_year_last_attended'),
            'primary_school_address' => $this->input->post('primary_school_address'),
            'primary_city' => $this->input->post('primary_city'),
            'primary_province' => $this->input->post('primary_province'),

            'program' => $this->input->post('program'),
            'status' => $this->input->post('status'),
            'transferee' => $this->input->post('transferee'),
            'remarks' => $inputData,
            'date_enrolled' =>  $this->input->post('date_enrolled'),
            'sem' => $this->input->post('sem'),
            'year_level' => $this->input->post('year_levels'),
            // 'date_created' => date('Y-m-d H:i:s'),
            'date_updated' => date('Y-m-d H:i:s')
        );
        
        $this->Student_model->update_student($this->input->post('id'), $data);

        // If the method is executed successfully, return a JSON response with status = true
        $response = array('status' => TRUE);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        
    }
}