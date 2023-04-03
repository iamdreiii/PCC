<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_loads extends CI_Controller {

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
            if(!file_exists(APPPATH.'views/admin/student_loads/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Class";
            $this->load->view('admin/student_loads/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}

    public function class_list()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Class_model->get_all_class_search($search,$start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $class) {
            $no++;
            $row = array();
            $row[] = $class->id;
            $row[] = $class->name;
            if($class->year_level == 1){
                $row[] = '1st Year';
            }elseif($class->year_level == 2){
                $row[] = '2nd Year';
            }elseif($class->year_level == 3){
                $row[] = '3rd Year';
            }elseif($class->year_level == 4){
                $row[] = '4th Year';
            }
            $row[] = $class->created_at;
            $row[] = $class->updated_at;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_class('."'".$class->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_class('."'".$class->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Class_model->count_filtered();
        $totalCount = $this->Class_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function class_add()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'year_level' => $this->input->post('year_level'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->Class_model->add_class($data);
        echo json_encode(array("status" => TRUE));
    }
    public function class_update()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'year_level' => $this->input->post('year_level'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->Class_model->update_class($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function class_edit($id)
    {
        $data = $this->Class_model->get_class($id);
        echo json_encode($data);
    }
    public function class_delete($id)
    {
        $this->Class_model->delete_class($id);
        echo json_encode(array("status" => TRUE));
    }
    // SUBEJCT PRE REQ
    

}
