<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_subjects extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }
	public function index()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin'  || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'index';
            if(!file_exists(APPPATH.'views/admin/student_subjects/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Subjects";
            $this->load->view('admin/student_subjects/'. $page, $data);    
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
            $list = $this->Student_subjects_model->load_students_data($search, $start, $length, $program, $year_level);
        } else {
            $list = $this->Student_subjects_model->load_students_data($search, $start, $length);
        }
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='.base_url().'view_student_loads/'.$user->id.'><i class="glyphicon glyphicon-book"></i> Loads</a>
                  <a class="btn btn-sm btn-warning" href="'.base_url().'edit_student_loads/'.$user->id.'" title="" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Student_subjects_model->count_filtered();
        $totalCount = $this->Student_subjects_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        
        echo json_encode($output);
    }

    // VIEW STUDENT SUBJECTS DYNAMICALLY
    public function view_student_loads($param)
    {
        $lasturl = $this->input->get('lasturl');
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'view_student_loads';
            if(!file_exists(APPPATH.'views/admin/student_subjects/'.$page.'.php')){
                show_404();
            }
            
            $student_data = $this->Student_subjects_model->get_student_data($param);
            $param2 = null; 
            foreach ($student_data as $row) {
                if ($row['year_level'] == '1st Year') {
                    $param2 = 1;
                    break; // Break the loop once the condition is met
                } elseif ($row['year_level'] == '2nd Year') {
                    $param2 = 2;
                    break;
                } elseif ($row['year_level'] == '3rd Year') {
                    $param2 = 3;
                    break;
                } elseif ($row['year_level'] == '4th Year') {
                    $param2 = 4;
                    break;
                }
            }
            foreach($student_data as $row) :
                
                $data['student_loads'] = $this->Student_subjects_model->fetch_student_loads($param, $param2);
                $data['student_data'] = $this->Student_subjects_model->get_student_data($param);
                if (isset($data['student_loads'][0]['school_year'])) {
                $data['sy'] = $data['student_loads'][0]['school_year'];
                }
            
            endforeach;
            //print_r($data['student_data']);
            $data['id'] = $param;
            $data['title'] = "View Student Loads";
            $data['lasturl'] = $lasturl;
            $this->load->view('admin/student_subjects/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }

    public function edit_student_loads($param)
    {
        $lasturl = $this->input->get('lasturl');
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'edit_student_loads';
            if(!file_exists(APPPATH.'views/admin/student_subjects/'.$page.'.php')){
                show_404();
            }
            
            $student_data = $this->Student_subjects_model->get_student_data($param);
            $param2 = null; 
            foreach ($student_data as $row) {
                if ($row['year_level'] == '1st Year') {
                    $param2 = 1;
                    break; // Break the loop once the condition is met
                } elseif ($row['year_level'] == '2nd Year') {
                    $param2 = 2;
                    break;
                } elseif ($row['year_level'] == '3rd Year') {
                    $param2 = 3;
                    break;
                } elseif ($row['year_level'] == '4th Year') {
                    $param2 = 4;
                    break;
                }
            }
            foreach($student_data as $row) :
                
                $data['student_loads'] = $this->Student_subjects_model->fetch_student_loads($param, $param2);
                $data['student_data'] = $this->Student_subjects_model->get_student_data($param);
                if (isset($data['student_loads'][0]['school_year'])) {
                $data['sy'] = $data['student_loads'][0]['school_year'];
                }
            
            endforeach;
            //print_r($data['student_data']);
            $data['id'] = $param;
            $data['title'] = "Edit Student Loads";
            $data['lasturl'] = $lasturl;
            $this->load->view('admin/student_subjects/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }

    public function print_student_loads($param)
    {
        $lasturl = $this->input->get('lasturl');
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'print_student_loads';
            if(!file_exists(APPPATH.'views/admin/student_subjects/'.$page.'.php')){
                show_404();
            }
            
            $student_data = $this->Student_subjects_model->get_student_data($param);
            $param2 = null; 
            foreach ($student_data as $row) {
                if ($row['year_level'] == '1st Year') {
                    $param2 = 1;
                    break; // Break the loop once the condition is met
                } elseif ($row['year_level'] == '2nd Year') {
                    $param2 = 2;
                    break;
                } elseif ($row['year_level'] == '3rd Year') {
                    $param2 = 3;
                    break;
                } elseif ($row['year_level'] == '4th Year') {
                    $param2 = 4;
                    break;
                }
            }
            foreach($student_data as $row) :
                
                $data['student_loads'] = $this->Student_subjects_model->fetch_student_loads($param, $param2);
                $data['student_data'] = $this->Student_subjects_model->get_student_data($param);
                if (isset($data['student_loads'][0]['school_year'])) {
                $data['sy'] = $data['student_loads'][0]['school_year'];
                }
            
            endforeach;
            //print_r($data['student_data']);
            $data['id'] = $param;
            $data['title'] = "Print Student Loads";
            $data['signatory'] = $this->Student_loads_model->signatory();
            $data['lasturl'] = $lasturl;
            $this->load->view('admin/student_subjects/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }
    

}
