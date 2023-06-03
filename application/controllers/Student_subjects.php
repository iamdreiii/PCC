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
            //$row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->student_id;
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-success" href='.base_url().'add_student_loads/'.$user->id.'><i class="glyphicon glyphicon-plus"></i> Loads</a>
            <a class="btn btn-sm btn-primary" href='.base_url().'view_student_loads/'.$user->id.'><i class="glyphicon glyphicon-eye-open"></i> Loads</a>
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
                    break; 
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
    public function add_student_loads($param)
    {
        $lasturl = $this->input->get('lasturl');
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'add_student_loads';
            if(!file_exists(APPPATH.'views/admin/student_subjects/'.$page.'.php')){
                show_404();
            }
            
            $student_data = $this->Student_subjects_model->get_student_data($param);
            $year = ''; 
            $program = '';
            foreach ($student_data as $row) :
                $program =  $row['pid'];

                if ($row['year_level'] == '1st Year') {
                    $year = 1;
                    break; // Break the loop once the condition is met
                } elseif ($row['year_level'] == '2nd Year') {
                    $year = 2;
                    break;
                } elseif ($row['year_level'] == '3rd Year') {
                    $year = 3;
                    break;
                } elseif ($row['year_level'] == '4th Year') {
                    $year = 4;
                    break;
                }
                
            endforeach;
            $data['subjects_list'] = $this->Student_subjects_model->get_subjects($year, $program);
            $data['student_data'] = $this->Student_subjects_model->get_student_data($param);
            $data['id'] = $param;
            $data['year'] = $year;
            $data['title'] = "Add Student Loads";
            $data['lasturl'] = $lasturl;
            $this->load->view('admin/student_subjects/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }
    
    public function getSubjectsData() 
    {
        $yearLevel = $this->input->get('yearLevel');
        $param = $this->input->get('id');
        $student_data = $this->Student_subjects_model->get_student_data($param);
        $st_year = '';
        $program = '';
        foreach ($student_data as $row) :
            $program =  $row['pid'];
            if ($row['year_level'] == '1st Year') {
                $ $st_year = 1;
                break; // Break the loop once the condition is met
            } elseif ($row['year_level'] == '2nd Year') {
                $ $st_year = 2;
                break;
            } elseif ($row['year_level'] == '3rd Year') {
                $ $st_year = 3;
                break;
            } elseif ($row['year_level'] == '4th Year') {
                $ $st_year = 4;
                break;
            }
        endforeach;
        $subjectsData = $this->Student_subjects_model->getSubjectsByYearLevel($st_year, $yearLevel, $program);
        $response = array(
            'subjectsData' => $subjectsData,
            'totalUnits' => $this->Student_subjects_model->getTotalUnits( $st_year, $yearLevel, $program)
        );

        // Send the JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // ADD SUBJECTS LOADS
    
    public function addLoads() {
        $subjectData = $this->input->post('subjectData');
        $studentId = $this->input->post('id');
        $query = $this->db->where('status', 'active')->get('tbl_school_year');
        $sy = $query->result_array();
        $s_y = '';
        foreach ($sy as $school_year) {
            $s_y = $school_year['school_year'];
        }
        
        $existingSubjects = array();
    
        foreach ($subjectData as $subject) {
            $subjectId = $subject['id'];
            $subjectCode = $subject['code'];
    
            $existingSubject = $this->Student_subjects_model->checkExistingSubject($subjectId, $studentId, $s_y);
    
            if ($existingSubject) {
                $existingSubjects[] = $subjectCode;
            } else {
                $data = array(
                    'subject_id' => $subjectId,
                    'subject_code' => $subjectCode,
                    'student_id' => $studentId,
                    'school_year' => $s_y
                );
                $this->Student_subjects_model->addSubjectLoad($data);
            }
        }
    
        if (!empty($existingSubjects)) {
            $response = array('success' => false, 'existingSubjects' => $existingSubjects);
            echo json_encode($response);
          } else {
            $response = array('success' => true);
            echo json_encode($response);
          }
          
    }
    
}
    
   
    

   


