<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signatory extends CI_Controller {

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
            if(!file_exists(APPPATH.'views/admin/signatory/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Signatory";
            $this->load->view('admin/signatory/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function list()
    {
        $search = $this->input->post("search")['value'];
        $list = $this->Signatory_model->get_all_signatory_search($search);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sy) {
            $no++;
            $row = array();
            $row[] = $sy->id;
            $row[] = $sy->fullname;
            $row[] = $sy->position;
            $row[] = $sy->created_at;
            $row[] = $sy->updated_at;
            if ($sy->status == 'active') {
                $row[] = '<button class="badge bg-green" id="badge_' . $sy->id . '" onclick="toggleStatus(' . $sy->id . ', \'' . $sy->status . '\')">' . $sy->status . '</button>';
            } else {
                $row[] = '<button class="badge bg-red" id="badge_' . $sy->id . '" onclick="toggleStatus(' . $sy->id . ', \'' . $sy->status . '\')">' . $sy->status . '</button>';
            };
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_sy('."'".$sy->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_sy('."'".$sy->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Signatory_model->count_filtered();
        $totalCount = $this->Signatory_model->count_all();
    
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
            'fullname' => $this->input->post('fullname'),
            'position' => $this->input->post('position'),
            'status' => 'inactive',
            'created_at' => date('Y-m-d H:i:s')
        );
        $insert = $this->Signatory_model->add_signatory($data);
        if($insert){
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode(array("status" => FALSE));
        }
    }
    public function edit($id)
    {
        $data = $this->Signatory_model->get_signatory($id);
        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'fullname' => $this->input->post('fullname'),
            'position' => $this->input->post('position'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->Signatory_model->update_signatory($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function sy_update_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if ($status == 'active') {
            $updatedStatus = 'inactive';
        } else {
            $updatedStatus = 'active';
        }
        $data = array(
            'status' => $updatedStatus,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $stat = $this->Signatory_model->update_sy_status($id, $data);

        if($stat ==  true){
            if ($status == 'inactive') {
                $this->Signatory_model->update_other_sy_statuses($id, 'inactive');
            }
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode(array("status" => FALSE));
        }
    }

    public function delete($id)
    {
        $this->Signatory_model->delete_signatory($id);
        echo json_encode(array("status" => TRUE));
    }
}