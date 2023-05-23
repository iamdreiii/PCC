<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }
    // BSE
    public function bse_first_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'bse_first_year';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bse_second_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'bse_second_year';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bse_third_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'bse_third_year';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bse_fourth_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'bse_fourth_year';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    // BPA
    public function bpa_first_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'bpa_first_year';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bpa_second_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'bpa_second_year';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bpa_third_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'bpa_third_year';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bpa_fourth_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'bpa_fourth_year';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    // BSE START
    public function bse_first_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Grades_model->get_all_student_bse_first_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'edit_grades/'.$user->id.'><i class="fa fa-list-alt" ></i>&nbsp;Grades</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Grades_model->bse_1_count_filtered();
        $totalCount = $this->Grades_model->bse_1_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    public function bse_second_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Grades_model->get_all_student_bse_second_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'edit_grades/'.$user->id.'><i class="fa fa-list-alt" ></i>&nbsp;Grades</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Grades_model->bse_2_count_filtered();
        $totalCount = $this->Grades_model->bse_2_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    public function bse_third_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Grades_model->get_all_student_bse_third_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'edit_grades/'.$user->id.'><i class="fa fa-list-alt" ></i>&nbsp;Grades</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Grades_model->bse_3_count_filtered();
        $totalCount = $this->Grades_model->bse_3_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    public function bse_fourth_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Grades_model->get_all_student_bse_fourth_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'edit_grades/'.$user->id.'><i class="fa fa-list-alt" ></i>&nbsp;Grades</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Grades_model->bse_4_count_filtered();
        $totalCount = $this->Grades_model->bse_4_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    // BSE END
    // BPA START
    public function bpa_first_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Grades_model->get_all_student_bpa_first_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'edit_grades/'.$user->id.'><i class="fa fa-list-alt" ></i>&nbsp;Grades</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Grades_model->bpa_1_count_filtered();
        $totalCount = $this->Grades_model->bpa_1_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    public function bpa_second_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Grades_model->get_all_student_bpa_second_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'edit_grades/'.$user->id.'><i class="fa fa-list-alt" ></i>&nbsp;Grades</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Grades_model->bpa_2_count_filtered();
        $totalCount = $this->Grades_model->bpa_2_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    public function bpa_third_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Grades_model->get_all_student_bpa_third_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'edit_grades/'.$user->id.'><i class="fa fa-list-alt" ></i>&nbsp;Grades</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Grades_model->bpa_3_count_filtered();
        $totalCount = $this->Grades_model->bpa_3_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    public function bpa_fourth_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Grades_model->get_all_student_bpa_fourth_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'edit_grades/'.$user->id.'><i class="fa fa-list-alt" ></i>&nbsp;Grades</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Grades_model->bpa_4_count_filtered();
        $totalCount = $this->Grades_model->bpa_4_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    // BPA END
    public function edit_grades($param)
    {
        $lasturl = $this->input->get('lasturl');
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'edit_grades';
            if(!file_exists(APPPATH.'views/admin/grades/'.$page.'.php')){
                show_404();
            }
            
            $data['student_data'] = $this->Student_loads_model->get_student_data($param);
            $data['id'] = $param;
            $data['title'] = "Manage Student Grades";
            $data['lasturl'] = $lasturl;
            $this->load->view('admin/grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }
    public function load_data()
    {
        $param = $this->input->get('id');
        $year = $this->input->get('year');
        $getstudent = $this->Student_loads_model->get_student_data($param, $year);
        
        foreach($getstudent as $stud) :
            if($stud['year_level'] == '1st Year'){
                $data = $this->Grades_model->bse_load_data_first_year($param, $year);
            } elseif($stud['year_level'] == '2nd Year'){
                $data = $this->Grades_model->bse_load_data_second_year($param, $year);
            } elseif($stud['year_level'] == '3rd Year'){
                $data = $this->Grades_model->bse_load_data_third_year($param, $year);
            } elseif($stud['year_level'] == '4th Year'){
                $data = $this->Grades_model->bse_load_data_fourth_year($param, $year);
            }
        endforeach; 
        echo json_encode($data);
    }
    public function update()
    {
      $data = array(
        $this->input->post('table_column') => $this->input->post('value')
        );
    
        $this->Grades_model->update($data, $this->input->post('id'));
    }
    
}