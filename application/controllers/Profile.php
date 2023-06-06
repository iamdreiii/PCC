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

    
    public function updateStaffData() 
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
      
        // Update the staff data in the 'tbl_staff' table
        $data = array(
          'username' => $username,
          'password' => md5($password)
        );
      
        $up = $this->Profile_model->updateStaffData($id, $data);
      if($up){
        $this->output->set_content_type('application/json');
        $this->output->set_header('Access-Control-Allow-Origin: *');
        echo json_encode(array('success' => true));
      } else {
        $this->output->set_content_type('application/json');
        $this->output->set_header('Access-Control-Allow-Origin: *');
        echo json_encode(array('success' => false));
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
    public function getStaffData1() {
        $this->load->library('session');
        $user = $this->session->userdata('user');
        extract($user); // Assuming the user ID is stored in the 'user_id' session variable
    
        if ($this->validateSession($id)) {
            $data = $this->Profile_model->getStaffData($id);
    
            // Encrypt the user data
            $encryptedData = openssl_encrypt(json_encode($data), 'AES-128-CBC', 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6', OPENSSL_RAW_DATA, 'e7f8aa397e32d77e');
    
            // Return the encrypted data as a JSON response
            $response = array('encryptedData' => $encryptedData);
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function getStaffData2()
    {
        // Retrieve the encrypted ID from the request
        $encryptedId = $this->input->post('encryptedId');
        
        // Decrypt the ID (implement your decryption logic here)
        $id = openssl_decrypt($encryptedId, 'AES-128-CBC', 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6', OPENSSL_RAW_DATA, 'e7f8aa397e32d77e');


        $user = $this->session->userdata('user');
        extract($user); 
    
        if ($this->validateSession($id)) {
            $data = $this->Profile_model->getStaffData($id);
    
            $encryptedData = openssl_encrypt(json_encode($data), 'AES-128-CBC', 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6', OPENSSL_RAW_DATA, 'e7f8aa397e32d77e');
    
            //$response = array('encryptedData' => $encryptedData);
            $this->output->set_content_type('application/json');
            $this->output->set_header('Access-Control-Allow-Origin: *');
    
            echo json_encode($encryptedData);
        } else {
            $this->output->set_status_header(401);
        }
        
    }
    public function opensslDecrypt1($data)
    {
        $key = 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6';
        $iv = 'e7f8aa397e32d77e';
        $decryptedData = openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

        return $decryptedData;
    }
    public function opensslEncrypt1()
    {
        $data = $this->input->post('data');
        $key = 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6';
        $iv = 'e7f8aa397e32d77e';
        $encryptedData = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        echo base64_encode($encryptedData);
    }
// Profile controller
public function opensslEncrypt2() {
    $encryptedData = $_POST['data']; // Assuming the data is sent via POST
    
    $key = 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6'; // Replace with your secret key
  
    // Decrypt the received encrypted data
    $decryptedData = openssl_decrypt($encryptedData, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, 'e7f8aa397e32d77e');
    
    // Perform necessary operations with the decrypted data
    // Example: storing data in the database, processing, etc.
  
    // Encrypt the response before sending it back to the client
    $encryptedResponse = openssl_encrypt($decryptedData, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, 'e7f8aa397e32d77e');
    
    // Encode the encrypted response as base64 for safe transmission
    $encodedResponse = base64_encode($encryptedResponse);
    
    // Return the encrypted response as a JSON response
    $response = array('encryptedData' => $encodedResponse);
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  
    

    private function validateSession($sessionID) 
    {
        $this->load->library('session');
        $user = $this->session->userdata('user');
        extract($user);
        if (isset($id) && $id === $sessionID) {
            return true; // Session is valid
        } else {
            return false; // Session is not valid
        }
    }


    public function updateStaff()
    {
        $encryptedData = $this->input->post('encryptedData');
        $decryptedData = $this->opensslDecrypt($encryptedData);
        
        $datajson = json_decode($decryptedData, true);
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
    }

    private function opensslDecrypt($data)
    {
        $key = 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6';
        $iv = 'e7f8aa397e32d77e';
        $decryptedData = openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

        return $decryptedData;
    }
    public function opensslEncrypt()
    {
        $data = $this->input->post('data');
        $key = 'fef8cd2c5ef8f7af9f2ad665c5585388243ea241d148399c75190440eca111f6';
        $iv = 'e7f8aa397e32d77e';
        $encryptedData = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        echo base64_encode($encryptedData);
    }

    public function gen()
    {
    $iv = openssl_random_pseudo_bytes(8);
    $key = openssl_random_pseudo_bytes(32);
    $ivHex = bin2hex($iv);
    $keyHex = bin2hex($key);
    echo "IV: $ivHex<br>";
    echo "Key: $keyHex";
    }
      
}