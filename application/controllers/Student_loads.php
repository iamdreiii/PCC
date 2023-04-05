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
            // $row[] = '<img src="'.base_url().'uploads/useruploads/'.$user->img.'" 
            // width="40" height="40" style="border-radius:50%;background-size:cover;" 
            // alt="Profile" id="myImg" onclick="openModal(this)">';
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
        $filteredCount = $this->Student_loads_model->count_filtered();
        $totalCount = $this->Student_loads_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }

}
