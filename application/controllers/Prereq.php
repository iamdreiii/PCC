<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prereq extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }
	public function bseindex()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bseindex';
            if(!file_exists(APPPATH.'views/admin/subject_prereq/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Subjects Prerequisites";
            $this->load->view('admin/subject_prereq/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function bpaindex()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'bpaindex';
            if(!file_exists(APPPATH.'views/admin/subject_prereq/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Subjects Prerequisites";
            $this->load->view('admin/subject_prereq/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    // BSE
    public function sub1_list()
    {
        $list = $this->Prereq_model->get_sub1();
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
        $list = $this->Prereq_model->get_sub2();
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
        $list = $this->Prereq_model->get_sub3();
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
        $list = $this->Prereq_model->get_sub4();
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
        $list = $this->Prereq_model->get_sub5();
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
        $list = $this->Prereq_model->get_sub6();
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
        $list = $this->Prereq_model->get_sub7();
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
        $list = $this->Prereq_model->get_sub8();
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

    // BPA
    public function bpa_sub1_list()
    {
        $list = $this->Prereq_model->bpa_get_sub1();
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
    public function bpa_sub2_list()
    {
        $list = $this->Prereq_model->bpa_get_sub2();
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
    public function bpa_sub3_list()
    {
        $list = $this->Prereq_model->bpa_get_sub3();
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
    public function bpa_sub4_list()
    {
        $list = $this->Prereq_model->bpa_get_sub4();
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
    public function bpa_sub5_list()
    {
        $list = $this->Prereq_model->bpa_get_sub5();
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
    public function bpa_sub6_list()
    {
        $list = $this->Prereq_model->bpa_get_sub6();
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
    public function bpa_sub7_list()
    {
        $list = $this->Prereq_model->bpa_get_sub7();
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
    public function bpa_sub8_list()
    {
        $list = $this->Prereq_model->bpa_get_sub8();
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
    public function prereq_update()
    {
        $data = array(
            'prereq' => $this->input->post('subjects1'),
            'date_updated' => date('Y-m-d H:i:s')
        );
        $this->Prereq_model->update_prereq($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function subject_edit($id)
    {
        $data = $this->Subject_model->get_subject($id);
        echo json_encode($data);
    }
    public function subject_Add($id)
    {
        $this->Subject_model->Add_subject($id);
        echo json_encode(array("status" => TRUE));
    }
    public function get_subjects()
    {
        $subject = $this->Prereq_model->get_subjects();
        echo json_encode($subject);
    }
    public function bpa_get_subjects()
    {
        $subject = $this->Prereq_model->bpa_get_subjects();
        echo json_encode($subject);
    }
    public function prereq_edit1($id)
    {
        $data = $this->Prereq_model->prereq_edit1($id);
        echo json_encode($data);
    }

}
