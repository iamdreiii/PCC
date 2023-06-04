<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }

	public function index()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff' )
        {
            $page = 'index';
            if(!file_exists(APPPATH.'views/admin/profile/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "User Profile";
            $this->load->view('admin/profile/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
}