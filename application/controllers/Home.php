<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $page = 'home';
           if(!file_exists(APPPATH.'views/student/'.$page.'.php')){
                show_404();
            }
            $this->load->view('student/'. $page);    
		
	}
}
