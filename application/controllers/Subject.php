<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

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
            if(!file_exists(APPPATH.'views/admin/subject/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Subjects";
            $this->load->view('admin/subject/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}

    public function subject_list()
    {
        
        $search = $this->input->post("search")['value'];
        $list = $this->Subject_model->get_all_subject_search($search);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $no++;
            $row = array();
            $row[] = $subject->id;
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            $row[] = $subject->year_level;
            $row[] = $subject->semester;
            $row[] = $subject->program_id;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_subject('."'".$subject->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_subject('."'".$subject->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Subject_model->count_filtered();
        $totalCount = $this->Subject_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function subject_add()
    {
        $data = array(
            'subcode' => $this->input->post('subcode'),
            'description' => $this->input->post('description'),
            'units' => $this->input->post('units'),
            'year_level' => $this->input->post('year_level'),
            'semester' => $this->input->post('semester'),
            'program_id' => $this->input->post('program_id'),
            'date_created' => date('Y-m-d H:i:s')
        );
        $insert = $this->Subject_model->add_subject($data);
        echo json_encode(array("status" => TRUE));
    }
    public function subject_update()
    {
        $data = array(
            'subcode' => $this->input->post('subcode'),
            'description' => $this->input->post('description'),
            'units' => $this->input->post('units'),
            'year_level' => $this->input->post('year_level'),
            'semester' => $this->input->post('semester'),
            'program_id' => $this->input->post('program_id'),
            'date_updated' => date('Y-m-d H:i:s')
        );
        $this->Subject_model->update_subject($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function subject_edit($id)
    {
        $data = $this->Subject_model->get_subject($id);
        echo json_encode($data);
    }
    public function subject_delete($id)
    {
        $this->Subject_model->delete_subject($id);
        echo json_encode(array("status" => TRUE));
    }

}
