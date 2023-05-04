<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

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
            if(!file_exists(APPPATH.'views/admin/staff/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Staff";
            $this->load->view('admin/staff/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function staff_list()
    {
        $search = $this->input->post("search")['value'];
        $list = $this->Staff_model->get_all_staff($search);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sy) {
            $no++;
            $row = array();
            $row[] = $sy->id;
            $row[] = $sy->username;
            $row[] = $sy->type;
            $row[] = $sy->active_status;
            $row[] = $sy->created_at;
            $row[] = $sy->updated_at;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_sy('."'".$sy->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_sy('."'".$sy->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Staff_model->count_filtered();
        $totalCount = $this->Staff_model->count_all();
    
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function add()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'type' => $this->input->post('type'),
            'active_status' => 'inactive',
            'created_at' => date('Y-m-d H:i:s')
        );
        $insert = $this->Staff_model->add($data);
        if($insert){
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode(array("status" => FALSE));
        }
        
    }

    public function edit($id)
    {
        $data = $this->Staff_model->get($id);
        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'type' => $this->input->post('type'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->Staff_model->update($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete($id)
    {
        $this->Staff_model->delete($id);
        echo json_encode(array("status" => TRUE));
    }
}