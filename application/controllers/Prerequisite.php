<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prerequisite extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }
	public function index()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'index';
            if(!file_exists(APPPATH.'views/admin/Prerequisite/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Subjects Prerequisites";
            $this->load->view('admin/Prerequisite/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}

    public function get_program()
    {
        $year_level = $this->Prerequisite_model->get_program();
        echo json_encode($year_level);
    }

    public function sub1_list()
    {
        $program = $this->input->post('filter_program');
        $list = $this->Prerequisite_model->get_sub1($program);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $row = array();
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            if(empty($subject->prereq)){
                $row[] = 'none';
            }else{
                $row[] = $subject->prereq;
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_prereq('."$subject->id".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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
    public function sub2_list()
    {
        $program = $this->input->post('filter_program');
        $list = $this->Prerequisite_model->get_sub2($program);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $row = array();
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            if(empty($subject->prereq)){
                $row[] = 'none';
            }else{
                $row[] = $subject->prereq;
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_prereq('."'".$subject->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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
    public function sub3_list()
    {
        $program = $this->input->post('filter_program');
        $list = $this->Prerequisite_model->get_sub3($program);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $row = array();
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            if(empty($subject->prereq)){
                $row[] = 'none';
            }else{
                $row[] = $subject->prereq;
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_prereq('."'".$subject->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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
    public function sub4_list()
    {
        $program = $this->input->post('filter_program');
        $list = $this->Prerequisite_model->get_sub4($program);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $row = array();
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            if(empty($subject->prereq)){
                $row[] = 'none';
            }else{
                $row[] = $subject->prereq;
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_prereq('.$subject->id.')"><i class="glyphicon glyphicon-pencil"></i></a>';
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
    public function sub5_list()
    {
        $program = $this->input->post('filter_program');
        $list = $this->Prerequisite_model->get_sub5($program);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $row = array();
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            if(empty($subject->prereq)){
                $row[] = 'none';
            }else{
                $row[] = $subject->prereq;
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_prereq('."'".$subject->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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
    public function sub6_list()
    {
        $program = $this->input->post('filter_program');
        $list = $this->Prerequisite_model->get_sub6($program);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $row = array();
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            if(empty($subject->prereq)){
                $row[] = 'none';
            }else{
                $row[] = $subject->prereq;
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_prereq('."'".$subject->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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
    public function sub7_list()
    {
        $program = $this->input->post('filter_program');
        $list = $this->Prerequisite_model->get_sub7($program);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $row = array();
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            if(empty($subject->prereq)){
                $row[] = 'none';
            }else{
                $row[] = $subject->prereq;
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_prereq('."'".$subject->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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
    public function sub8_list()
    {
        $program = $this->input->post('filter_program');
        $list = $this->Prerequisite_model->get_sub8($program);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $subject) {
            $row = array();
            $row[] = $subject->subcode;
            $row[] = $subject->description;
            $row[] = $subject->units;
            if(empty($subject->prereq)){
                $row[] = 'none';
            }else{
                $row[] = $subject->prereq;
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_prereq('."'".$subject->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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

    public function get_subjects1()
    {
        $program_id = $this->input->post('program_id'); // Retrieve program_id from the request

        $subjects = $this->Prerequisite_model->get_subjects1($program_id);
        echo json_encode($subjects);
    }

    public function prereq_update()
    {
        $data = array(
            'prereq' => $this->input->post('subjects1'),
            'date_updated' => date('Y-m-d H:i:s')
        );
        $this->Prerequisite_model->update_prereq($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function prereq_edit1($id)
    {
        $data = $this->Prerequisite_model->prereq_edit1($id);
        echo json_encode($data);
    }

    

}