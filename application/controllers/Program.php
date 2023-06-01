<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

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
            if(!file_exists(APPPATH.'views/admin/program/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Program/Course";
            $this->load->view('admin/program/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function list()
    {
        $search = $this->input->post("search")['value'];
        $list = $this->Program_model->get_all_program_search($search);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sy) {
            $no++;
            $row = array();
            $row[] = $sy->id;
            $row[] = $sy->course;
            $row[] = $sy->description;
            $row[] = $sy->created_at;
            $row[] = $sy->updated_at;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_program('."'".$sy->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_program('."'".$sy->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Program_model->count_filtered();
        $totalCount = $this->Program_model->count_all();
    
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
            'course' => $this->input->post('course'),
            'description' => $this->input->post('description'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $insert = $this->Program_model->add_program($data);
        if($insert){
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode(array("status" => FALSE));
        }
    }
    public function edit($id)
    {
        $data = $this->Program_model->get_program($id);
        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'course' => $this->input->post('course'),
            'description' => $this->input->post('description'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->Program_model->update_program($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete($id)
    {
        $this->Program_model->delete_program($id);
        echo json_encode(array("status" => TRUE));
    }
}