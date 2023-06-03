<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_grades extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }
    public function index()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'index';
            if(!file_exists(APPPATH.'views/admin/Student_grades/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Grades";
            $this->load->view('admin/Student_grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}

    // LOAD FILTERS
    public function get_year_level()
    {
        $year_level = $this->Student_model->get_year_level();
        echo json_encode($year_level);
    }
    // LOAD FILTERS
    public function get_program()
    {
        $year_level = $this->Student_model->get_program();
        echo json_encode($year_level);
    }

    // LOAD SERVER-SIDE DATA
    public function load_students()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $year_level = $this->input->post('filter_year_level'); 
        $program = $this->input->post('filter_program'); 
        if (!empty($year_level) || !empty($program) || $year_level != null || $program != null) {
            $list = $this->Student_grades_model->load_students_data($search, $start, $length, $program, $year_level);
        } else {
            $list = $this->Student_grades_model->load_students_data($search, $start, $length);
        }
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            //$row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
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
        $filteredCount = $this->Student_grades_model->count_filtered();
        $totalCount = $this->Student_grades_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    // EDIT GRADES CONTROLLER
    public function edit_grades($param)
    {
        $lasturl = $this->input->get('lasturl');
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'edit_grades';
            if(!file_exists(APPPATH.'views/admin/Student_grades/'.$page.'.php')){
                show_404();
            }
            
            $data['student_data'] = $this->Student_grades_model->get_student_data($param);
            $data['id'] = $param;
            $data['title'] = "Manage Student Grades";
            $data['lasturl'] = $lasturl;
            $this->load->view('admin/Student_grades/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }

    public function load_data()
    {
        $param = $this->input->get('id');
        $year = $this->input->get('year');
        $student_data = $this->Student_grades_model->get_student_data($param, $year);
        $program = '';
        foreach ($student_data as $row) :
            $program =  $row['pid'];
        endforeach;
        $data = $this->Student_grades_model->load_students_subjects($param, $year, $program);
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