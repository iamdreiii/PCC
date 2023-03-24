<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }
	public function index()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'dashboard';
            if(!file_exists(APPPATH.'views/admin/dashboard/'.$page.'.php')){
                show_404();
            }
            $data['staffcount'] = $this->Users_model->count_all_staff();
            $data['school_year'] = $this->Schoolyear_model->get_current_school_year();
            $data['usercount'] = $this->Users_model->count_all_student();
            $this->load->view('admin/dashboard/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
}
