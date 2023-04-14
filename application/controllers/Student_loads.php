<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_loads extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }
	public function bse_first_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bse_first_year';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Loads First year";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bse_second_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bse_second_year';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Loads First year";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bse_third_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bse_third_year';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Loads First year";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bse_fourth_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bse_fourth_year';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Loads First year";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bpa_first_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bpa_first_year';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Loads First year";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bpa_second_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bpa_second_year';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Loads First year";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bpa_third_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bpa_third_year';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Loads First year";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bpa_fourth_year()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bpa_fourth_year';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Student Loads First year";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    // BSE
    public function bse_first_year_student_list()
    {
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Student_loads_model->get_all_student_bse_first_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
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
        $filteredCount = $this->Student_loads_model->bse_1_count_filtered();
        $totalCount = $this->Student_loads_model->bse_1_count_all();

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
        $list = $this->Student_loads_model->get_all_student_bse_second_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='."'".base_url().'view_student_loads/'.$user->id."'".'><i class="glyphicon glyphicon-book"></i> Loads</a>
                  <a class="btn btn-sm btn-warning" href="'.base_url().'edit_student_loads/'.$user->id.'" title="" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Student_loads_model->bse_2_count_filtered();
        $totalCount = $this->Student_loads_model->bse_2_count_all();

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
        $list = $this->Student_loads_model->get_all_student_bse_third_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='."'".base_url().'view_student_loads/'.$user->id."'".'><i class="glyphicon glyphicon-book"></i> Loads</a>
                  <a class="btn btn-sm btn-warning" href="'.base_url().'edit_student_loads/'.$user->id.'" title="" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Student_loads_model->bse_3_count_filtered();
        $totalCount = $this->Student_loads_model->bse_3_count_all();

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
        $list = $this->Student_loads_model->get_all_student_bse_fourth_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='."'".base_url().'view_student_loads/'.$user->id."'".'><i class="glyphicon glyphicon-book"></i> Loads</a>
                  <a class="btn btn-sm btn-warning" href="'.base_url().'edit_student_loads/'.$user->id.'" title="" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Student_loads_model->bse_4_count_filtered();
        $totalCount = $this->Student_loads_model->bse_4_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }

    // BPA
    public function bpa_first_year_student_list()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Student_loads_model->get_all_student_bpa_first_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='."'".base_url().'view_student_loads/'.$user->id."'".'><i class="glyphicon glyphicon-book"></i> Loads</a>
                  <a class="btn btn-sm btn-warning" href="'.base_url().'edit_student_loads/'.$user->id.'" title="" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Student_loads_model->bpa_1_count_filtered();
        $totalCount = $this->Student_loads_model->bpa_1_count_all();

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
        $list = $this->Student_loads_model->get_all_student_bpa_second_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='."'".base_url().'view_student_loads/'.$user->id."'".'><i class="glyphicon glyphicon-book"></i> Loads</a>
                  <a class="btn btn-sm btn-warning" href="'.base_url().'edit_student_loads/'.$user->id.'" title="" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Student_loads_model->bpa_2_count_filtered();
        $totalCount = $this->Student_loads_model->bpa_2_count_all();

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
        $list = $this->Student_loads_model->get_all_student_bpa_third_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='."'".base_url().'view_student_loads/'.$user->id."'".'><i class="glyphicon glyphicon-book"></i> Loads</a>
                  <a class="btn btn-sm btn-warning" href="'.base_url().'edit_student_loads/'.$user->id.'" title="" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Student_loads_model->bpa_3_count_filtered();
        $totalCount = $this->Student_loads_model->bpa_3_count_all();

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
        $list = $this->Student_loads_model->get_all_student_bpa_fourth_year($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->fname .' '. $user->mname .'. '. $user->lname .' '. $user->extension;
            $row[] = $user->email;
            $row[] = $user->sex;
            $row[] = $user->program;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = '<a class="btn btn-sm btn-primary" href='."'".base_url().'view_student_loads/'.$user->id."'".'><i class="glyphicon glyphicon-book"></i> Loads</a>
                  <a class="btn btn-sm btn-warning" href="'.base_url().'edit_student_loads/'.$user->id.'" title="" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Student_loads_model->bpa_4_count_filtered();
        $totalCount = $this->Student_loads_model->bpa_4_count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function get_subjects()
    {
        $subjects = $this->Student_loads_model->get_subjects();
        echo json_encode($subjects);
    }
    public function add_student_loads()
    {
        $subject_ids = $this->input->post('subject_ids');
        $subcodes = $this->input->post('subcodes');
        $user_ids = $this->input->post('user_ids');

        // Loop through each user id and insert the subject ids
        foreach ($user_ids as $user_id) {
            foreach ($subject_ids as $key => $subject_id) {
                $subcode = $subcodes[$key];
                // Check if the student has already added this subject
                $query = $this->db->get_where('tbl_student_subject_loads', array('student_id' => $user_id,'subject_code' => $subcode,  'subject_id' => $subject_id));
                if ($query->num_rows() > 0) {
                    // Student has already added this subject
                    continue;
                }
                
                // Insert the subject id for the student id
                $data = array('student_id' => $user_id, 'subject_code' => $subcode, 'subject_id' => $subject_id);
                $result = $this->db->insert('tbl_student_subject_loads', $data);
                
                // Check if the insert was successful
                if (!$result) {
                    // If the query failed due to a duplicate entry error, return a message indicating that the student has already added this subject
                    $error_code = $this->db->error()['code'];
                    if ($error_code == 1062) {
                        echo 'Student has already added the subject with ID ' . $subject_id . '.';
                    } else {
                        echo 'Error adding student subject load with ID ' . $subject_id . '.';
                    }
                    return;
                }
            }
        }
        
        echo 'Student Loads Added successfully.';
    }

    public function view_student_loads($param)
    {
        $lasturl = $this->input->get('lasturl');
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'view_student_loads';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "View Student Loads";
            $data['student_loads'] = $this->Student_loads_model->get_student_loads($param);
            $data['student_data'] = $this->Student_loads_model->get_student_data($param);
            $data['id'] = $param;
            $data['lasturl'] = $lasturl;
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }
    public function edit_student_loads($param)
    {
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'edit_student_loads';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Edit Student Loads";
            $data['student_loads'] = $this->Student_loads_model->get_student_loads($param);
            $data['student_data'] = $this->Student_loads_model->get_student_data($param);
            $data['id'] = $param;
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }
    public function print_student_loads($param)
    {
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'print_student_loads';
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['student_data'] = $this->Student_loads_model->get_student_data($param);
            $data['id'] = $param;
            $data['student_loads'] = $this->Student_loads_model->get_student_loads_print($param);
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
    }
    public function delete_student_loads($ids) {
        // Convert the comma-separated IDs string to an array
        $otherId = $this->input->get('other_id');
        $selectedIds = explode(',', $ids);

        // Delete the selected subjects
        if (!empty($selectedIds)) {
            foreach ($selectedIds as $id) {
                // Call the delete_subject method of the student_load_model to delete the subject by ID
                $this->Student_loads_model->delete_subject_loads($id);
            }
        }

        // Redirect or display a success message, depending on your requirements
        redirect('view_student_loads/' . $otherId); // Redirect to the view_student_loads page with the appropriate ID
    }


}
