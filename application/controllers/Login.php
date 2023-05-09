<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      
      
    }

    


    public function inactive_user() {
        // get user id from session data
        $user = $this->session->userdata('user')['id'];
        // extract($user);
        //var_dump($user);
        // update user status to inactive in the database
        $this->db->where('id', $user);
        $this->db->update('tbl_staff', array('active_status' => 'inactive'));
        
        //unset session data
        $this->session->unset_userdata('id');
    }
    
	public function index()
	{
       
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            redirect('dashboard');  
        }
        elseif($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'teacher') 
        {
            redirect('teacher-dashboard');   
        }elseif($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'registrar') 
        {
            redirect('registrar-dashboard');  
        }else{
            $page = 'login';
            if(!file_exists(APPPATH.'views/admin/dashboard/'.$page.'.php')){
                show_404();
            }
            $this->load->view('admin/dashboard/'. $page);
        }
	}
    public function login()
    {
        //load session library
		$this->load->library('session');
		$output = array('error' => false);
		$username = $_POST['username'];
		$password = md5($_POST['password']);
        $this->db->where('username', $username);
        $this->db->update('tbl_staff', array('active_status' => 'active', 'last_activity' => time()));
		$data = $this->Login_model->login($username, $password);
		if($data){
            
			$this->session->set_userdata('user', $data);
			$output['message'] = 'Logging in. Please wait...';
            $this->session->set_tempdata('success','Logged In',1);
		}
		else{
			$output['error'] = true;
            $output['message'] = 'Login Invalid. User not found';
		}
		echo json_encode($output); 
    }
    public function logout(){
        $user = $this->session->userdata('user')['id'];
        $this->db->where('id', $user);
        $this->db->update('tbl_staff', array('active_status' => 'inactive'));
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
        $this->session->set_tempdata('success','Logged out!',1);
        redirect('staff');
       
	}
}