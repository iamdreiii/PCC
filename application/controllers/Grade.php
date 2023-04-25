<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends CI_Controller {

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
            $page = 'index';
            if(!file_exists(APPPATH.'views/admin/grade/'.$page.'.php')){
                show_404();
            }
            $this->load->view('admin/grade/'. $page );    
        }else{
            redirect('staff');
        }	
	}
    
    function load_data()
    {
    $data = $this->Grade_model->load_data();
    echo json_encode($data);
    }

    function insert()
    {
    $data = array(
    'first_name' => $this->input->post('first_name'),
    'last_name'  => $this->input->post('last_name'),
    'age'   => $this->input->post('age')
    );

    $this->Grade_model->insert($data);
    }

    function update()
    {
    $data = array(
    $this->input->post('table_column') => $this->input->post('value')
    );

    $this->Grade_model->update($data, $this->input->post('id'));
    }

    function delete()
    {
    $this->Grade_model->delete($this->input->post('id'));
    }
}