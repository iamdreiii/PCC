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
    public function userprofile()
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

    public function getStaffData() 
    {
        $this->load->library('session');
        $user = $this->session->userdata('user');
        extract($user); // Assuming the user ID is stored in 'user_id' session variable

        if ($this->validateSession($id)) {
        $data = $this->Profile_model->getStaffData($id);

        $this->output->set_content_type('application/json');
        $this->output->set_header('Access-Control-Allow-Origin: *');

        echo json_encode($data);
        } else {
        $this->output->set_status_header(401);
        }
    }

    private function validateSession($sessionID) 
    {
        $this->load->library('session');
        $user = $this->session->userdata('user');
        extract($user);
        if (isset($id) && $id === $sessionID) {
            return true;
        } else {
            return false;
        }
    }

    public function opensslEncrypt()
    {
        $data = $this->input->post('data');
        $key = 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6';
        $iv = 'e7f8aa397e32d77e';
        $encryptedData = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        echo base64_encode($encryptedData);
    }
    
    public function updateStaff()
    {
        $encryptedData = $this->input->post('encryptedData');
        $decryptedData = $this->opensslDecryptUserData($encryptedData);
    
        $datajson = json_decode($decryptedData, true);
        
        // Check if 'id' key exists in $datajson array
        if (isset($datajson['id'])) {
            $id = $datajson['id'];
    
            $data = array(
                'username' => $datajson['username'],
                'password' => md5($datajson['password'])
            );
    
            $result = $this->Profile_model->updateStaff($id, $data);
            if ($result) {
                $this->session->set_flashdata('success', 'Settings saved successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to save settings. Please try again.');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid data format. Missing ID.');
        }
    }
    
    private function opensslDecryptUserData($encryptedData)
    {
        $encryptionKey = 'fef8cd2c5ef8f7af9f2ad665c5585388'; // 16-byte key
        $iv = '243ea241d148399c243ea241d148399c'; // 16-byte initialization vector
    
        $decrypted = openssl_decrypt(base64_decode($encryptedData), 'AES-128-CBC', hex2bin($encryptionKey), OPENSSL_RAW_DATA, hex2bin($iv));
        return $decrypted;
    }
    
}