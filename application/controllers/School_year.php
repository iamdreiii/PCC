<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_year extends CI_Controller {

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
            $page = 'school_year';
            if(!file_exists(APPPATH.'views/admin/schoolyear/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage School Year';
            $this->load->view('admin/schoolyear/'. $page, $data);    
        }else{
            redirect('staff');
        }
    }
    // public function sy_list()
    // {
        
    //     $search = $this->input->post("search")['value'];
    //     $list = $this->Schoolyear_model->get_all_sy_search($search);
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($list as $sy) {
    //         $no++;
    //         $row = array();
    //         $row[] = $sy->id;
    //         $row[] = $sy->school_year;
    //         if($sy->status == 'active'){ 
    //             $row[] ='<span class="badge bg-green">'.$sy->status.'</span>';
    //         }else{ $row[] ='<span class="badge bg-red">'.$sy->status.'</span>';};
    //         $row[] = $sy->created_at;
    //         $row[] = $sy->updated_at;
    //         $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_sy('."'".$sy->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
    //               <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_sy('."'".$sy->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
    //         $data[] = $row;
    //     }
    //     $filteredCount = $this->Schoolyear_model->count_filtered();
    //     $totalCount = $this->Schoolyear_model->count_all();

    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $totalCount,
    //         "recordsFiltered" => $filteredCount,
    //         "data" => $data,
    //     );
    //     echo json_encode($output);
    // }

    public function sy_list()
    {
        $search = $this->input->post("search")['value'];
        $list = $this->Schoolyear_model->get_all_sy_search($search);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sy) {
            $no++;
            $row = array();
            $row[] = $sy->id;
            $row[] = $sy->school_year;
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
        $filteredCount = $this->Schoolyear_model->count_filtered();
        $totalCount = $this->Schoolyear_model->count_all();
    
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    

    
    
    public function sy_add()
    {
        $data = array(
            'school_year' => $this->input->post('school_year'),
            'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
        );
        $insert = $this->Schoolyear_model->add_sy($data);
        echo json_encode(array("status" => TRUE));
    }

    public function sy_edit($id)
    {
        $data = $this->Schoolyear_model->get_sy($id);
        echo json_encode($data);
    }

    public function sy_update()
    {
        $data = array(
            'school_year' => $this->input->post('school_year'),
            // 'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->Schoolyear_model->update_sy($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function sy_update_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        // Update status based on current status
        if ($status == 'active') {
            // Update to inactive
            $updatedStatus = 'inactive';
        } else {
            // Update to active
            $updatedStatus = 'active';
        }
        $data = array(
            'status' => $updatedStatus,
            // 'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        // Call your model function to update the status in the database
        $stat = $this->Schoolyear_model->update_sy_status($id, $data);

        if($stat ==  true){
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode(array("status" => FALSE));
        }
    }

    public function sy_delete($id)
    {
        $this->Schoolyear_model->delete_sy($id);
        echo json_encode(array("status" => TRUE));
    }
}