<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
    }
	public function index()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'index';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    // BSE PAGES START
    public function bse_first_year()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'bse_first_year';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    public function bse_second_year()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'bse_second_year';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    public function bse_third_year()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'bse_third_year';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    public function bse_fourth_year()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'bse_fourth_year';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    // BSE PAGES END

    // BPA PAGES START
    public function bpa_first_year()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'bpa_first_year';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    public function bpa_second_year()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'bpa_second_year';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    public function bpa_third_year()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'bpa_third_year';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    public function bpa_fourth_year()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'bpa_fourth_year';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    // BPA PAGES END

    public function user_list()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->get_all_users_search($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->count_filtered();
        $totalCount = $this->Users_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    // BSE DATATABLES START
    public function bse_student_list_first_year()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->bse_student_list_first_year($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->bse_count_all_first_year();
        $totalCount = $this->Users_model->bse_count_filter_first_year();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function bse_student_list_second_year()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->bse_student_list_second_year($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->bse_count_all_second_year();
        $totalCount = $this->Users_model->bse_count_filter_second_year();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function bse_student_list_third_year()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->bse_student_list_third_year($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->bse_count_all_third_year();
        $totalCount = $this->Users_model->bse_count_filter_third_year();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function bse_student_list_fourth_year()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->bse_student_list_fourth_year($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->bse_count_all_fourth_year();
        $totalCount = $this->Users_model->bse_count_filter_fourth_year();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    // BSE DATATABLES END

    // BPA DATATABLES START
    public function bpa_student_list_first_year()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->bpa_student_list_first_year($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->bpa_count_all_first_year();
        $totalCount = $this->Users_model->bpa_count_filter_first_year();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function bpa_student_list_second_year()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->bpa_student_list_second_year($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->bpa_count_all_second_year();
        $totalCount = $this->Users_model->bpa_count_filter_second_year();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function bpa_student_list_third_year()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->bpa_student_list_third_year($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->bpa_count_all_third_year();
        $totalCount = $this->Users_model->bpa_count_filter_third_year();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function bpa_student_list_fourth_year()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->bpa_student_list_fourth_year($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            width="40" height="40" style="border-radius:50%;background-size:cover;" 
            alt="Profile" id="myImg" onclick="openModal(this)">';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->bpa_count_all_fourth_year();
        $totalCount = $this->Users_model->bpa_count_filter_fourth_year();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    // BPA DATATABLES END
    public function user_add()
    {
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
            'year_level' => $this->input->post('year_levels'),
            'date_created' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->Users_model->add_user($data);
        echo json_encode(array("status" => TRUE));
    }

    public function user_edit($id)
    {
        $data = $this->Users_model->get_user($id);
        echo json_encode($data);
    }

    public function user_update()
    {
        $config['upload_path'] = 'uploads/useruploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 5242880;
        $config['max_width'] = 5242880;
        $config['max_height'] = 5242880;
        $this->load->library('upload', $config);
                
        $user_id = $this->input->post('id');
        $data['userimg'] = '';

        if (isset($_FILES['imgfile']) && !empty($_FILES['imgfile']['name'])) {
            if ($this->upload->do_upload('imgfile')) {
                $upload_data = $this->upload->data();
                $data['userimg'] = $upload_data['file_name'];
    
                // Unlink the old image from the folder that belongs to the selected user
                $old_image_path = $config['upload_path'] . $this->db->select('img')->where('id', $user_id)->get('tbl_student')->row('img');
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            } else {
                // Error uploading image
                $error = array('error' => $this->upload->display_errors());
                echo json_encode(array("status" => FALSE, "error" => $error['error']));
                return;
            }
        }
        if(empty($data['userimg'])){
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
                'year_level' => $this->input->post('year_levels'),
                // 'date_created' => date('Y-m-d H:i:s'),
                'date_updated' => date('Y-m-d H:i:s'),
            );
        }else{
        $data = array(
            'img' => $data['userimg'],
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
            'year_level' => $this->input->post('year_levels'),
            // 'date_created' => date('Y-m-d H:i:s'),
            'date_updated' => date('Y-m-d H:i:s'),
        );
    }
        try {
            // Call the add_user method in the model
            $this->Users_model->update_user($this->input->post('id'), $data);
    
            // If the method is executed successfully, return a JSON response with status = true
            $response = array('status' => TRUE);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        } catch (Exception $e) {
            // If there is an error, assign the error message to a variable
            $error = $e->getMessage();
    
            // Return a JSON response with status = false and the error message
            $response = array('status' => FALSE, 'error' => $error);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
        
    }

    public function user_delete($id)
    {
        $old_image_path =  'uploads/useruploads/'.$this->db->select('img')->where('id', $id)->get('tbl_student')->row('img');
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
        $this->Users_model->delete_user($id);
        echo json_encode(array("status" => TRUE));
    }

    public function update_class_id() 
    {
        $class_id = $this->input->post('class_id');
        $user_ids = $this->input->post('user_ids');
        $result = $this->Users_model->update_class_id($class_id, $user_ids);
        if ($result) {
          echo 'Class ID updated successfully.';
        } else {
          echo 'Error updating Class ID.';
        }
      }

    // in your controller file
    public function delete_multiple() {
        $ids = $this->input->post('ids');
        $this->Users_model->delete_multiple($ids); // call a model method to delete the selected rows
        echo 'success'; // return a response to the AJAX request
    }


    public function validate_email()
    {
        $email = $this->input->post('email');
        $result = $this->Users_model->validate_email($email);
        if ($result) {
            // Email already exists in database
            $response['status'] = false;
        } else {
            // Email is available
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    
    public function get_courses()
    {
        $courses = $this->Users_model->get_courses();
        echo json_encode($courses);
    }
    public function get_classes()
    {
        $classes = $this->Users_model->get_classes();
        echo json_encode($classes);
    }
    public function get_year_level()
    {
        $year_level = $this->Users_model->get_year_level();
        echo json_encode($year_level);
    }

    
}
