<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Records extends CI_Controller {

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
            if(!file_exists(APPPATH.'views/admin/records/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Records";
            $this->load->view('admin/records/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function user_list()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Records_model->get_all_users($search, $start, $length);
        $data = array();
        //$no = $_POST['start'];
        foreach ($list as $user) {
           // $no++;
            $row = array();
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<div class="btn-group">
            <button type="button" class="btn btn-success">Action</button>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
            <li><a href="'.base_url().'print_student_academic_records/'. $user->id.'">Academic Records</a></li>
            <li><a href="'.base_url().'cert_of_enrollment/'. $user->id.'">Cert. of Enrollment</a></li>
            <li><a href="'.base_url().'cert_of_grade/'. $user->id.'">Cert. of Grade</a></li>
            <li><a href="'.base_url().'cert_of_transfer/'. $user->id.'">Cert. of Transfer</a></li>
            <li><a href="'.base_url().'form_138/'. $user->id.'">Form-138</a></li>
            <li><a href="'.base_url().'print_tentative_evaluation/'. $user->id.'">Tentative Evaluation</a></li>
            <li><a href="'.base_url().'tor/'. $user->id.'">Transcript of Records</a></li>
            </ul>
            </div>';
            $data[] = $row;
        }
        $filteredCount = $this->Records_model->count_filtered();
        $totalCount = $this->Records_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_student');
    }


    //START PRINT SECTIONS CONTROLLER
    public function print_student_academic_records($param)
    {
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'print_student_academic_records';
            if(!file_exists(APPPATH.'views/admin/records/'.$page.'.php')){
                show_404();
            }
            $data['first_student_loads'] = $this->Student_loads_model->get_student_loads_first_year($param);
            $data['second_student_loads'] = $this->Student_loads_model->get_student_loads_second_year($param);
            $data['third_student_loads'] = $this->Student_loads_model->get_student_loads_third_year($param);
            $data['fourth_student_loads'] = $this->Student_loads_model->get_student_loads_fourth_year($param);
            $data['student_data'] = $this->Student_loads_model->get_student_data($param);
            $data['signatory'] = $this->Student_loads_model->signatory();
            if (isset($data['first_student_loads'][0]['school_year'])) {
            $data['firstsy'] = $data['first_student_loads'][0]['school_year'];
            }
            if (isset($data['second_student_loads'][0]['school_year'])) {
            $data['secondsy'] = $data['second_student_loads'][0]['school_year'];
            }
            if (isset($data['third_student_loads'][0]['school_year'])) {
            $data['thirdsy'] = $data['third_student_loads'][0]['school_year'];
            }
            if (isset($data['fourth_student_loads'][0]['school_year'])) {
            $data['fourthsy'] = $data['fourth_student_loads'][0]['school_year'];
            }
            $data['id'] = $param;
            $this->load->view('admin/records/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }
    public function print_tentative_evaluation($param)
    {
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'print_tentative_evaluation';
            if(!file_exists(APPPATH.'views/admin/records/'.$page.'.php')){
                show_404();
            }
            $data['first_student_loads'] = $this->Student_loads_model->get_student_loads_first_year($param);
            $data['second_student_loads'] = $this->Student_loads_model->get_student_loads_second_year($param);
            $data['third_student_loads'] = $this->Student_loads_model->get_student_loads_third_year($param);
            $data['fourth_student_loads'] = $this->Student_loads_model->get_student_loads_fourth_year($param);

            $data['countbse'] = $this->Student_loads_model->countbse();
            $data['countbpa'] = $this->Student_loads_model->countbpa();
            $data['student_data'] = $this->Student_loads_model->get_student_data($param);
            $data['signatory'] = $this->Student_loads_model->signatory();
            $data['sy'] = $this->Student_loads_model->sy();
            if (isset($data['first_student_loads'][0]['school_year'])) {
            $data['firstsy'] = $data['first_student_loads'][0]['school_year'];
            }
            if (isset($data['second_student_loads'][0]['school_year'])) {
            $data['secondsy'] = $data['second_student_loads'][0]['school_year'];
            }
            if (isset($data['third_student_loads'][0]['school_year'])) {
            $data['thirdsy'] = $data['third_student_loads'][0]['school_year'];
            }
            if (isset($data['fourth_student_loads'][0]['school_year'])) {
            $data['fourthsy'] = $data['fourth_student_loads'][0]['school_year'];
            }
            $data['id'] = $param;
            $this->load->view('admin/records/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }
    // END SECTION CONTROLLER
}