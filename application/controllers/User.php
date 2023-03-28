<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
        $page = 'users';
           if(!file_exists(APPPATH.'views/admin/user/'.$page.'.php')){
                show_404();
            }
            $data['title'] = 'Manage Students';
            $this->load->view('admin/user/'. $page, $data);    
        }else{
            redirect('staff');
        }
		
	}
    public function user_list()
    {
        
        $search = $this->input->post("search")['value'];
        // $filter_class = $this->input->post("filter_class");
        // $filter_year_level = $this->input->post("filter_year_level");
        // $filter_gender = $this->input->post("filter_gender");
        // , $filter_class, $filter_year_level, $filter_gender
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Users_model->get_all_users_search($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = ' <td><input type="checkbox" name="selected[]" value='."'".$user->id."'".'"></td>';
            $row[] = $user->school_id;
            $row[] = $user->fname .' '. $user->mname .' '. $user->lname .' '. $user->extensions;
            $row[] = $user->email;
            $row[] = $user->gender;
            $row[] = $user->course;
            $row[] = $user->class_id;
            $row[] = $user->year_level;
            $row[] = $user->enrollment_status;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Users_model->count_filtered();
        $totalCount = $this->Users_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    
    public function user_add()
    {
        $school_id = 'PCC'.date('y').'-'.rand(0,10000);
        $data = array(
            'school_id' => $school_id,
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender' => $this->input->post('gender'),
            'extensions' => $this->input->post('extensions'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone_number'),
            'address' => $this->input->post('address'),
            'password' => md5($this->input->post('password')),
            'enrollment_status' => $this->input->post('enrollment_status'),
            'course' => $this->input->post('course'),
            'year_level' => $this->input->post('year_level'),
            'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
        );
        $insert = $this->Users_model->add_user($data);
        echo json_encode(array("status" => TRUE));
    }

    public function user_edit($id)
    {
        $data = $this->Users_model->get_user($id);
        echo json_encode($data);
    }

    public function user_update()
    {
        $data = array(
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender' => $this->input->post('gender'),
            'extensions' => $this->input->post('extensions'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone_number'),
            'address' => $this->input->post('address'),
            'password' => md5($this->input->post('password')),
            'course' => $this->input->post('course'),
            'year_level' => $this->input->post('year_level'),
            'enrollment_status' => $this->input->post('enrollment_status'),
            // 'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->Users_model->update_user($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function user_delete($id)
    {
        $this->Users_model->delete_user($id);
        echo json_encode(array("status" => TRUE));
    }

    public function update_class_id() 
    {
        $class_id = $this->input->post('class_id');
        $user_ids = $this->input->post('user_ids');
        $result = $this->Users_model->update_class_id($class_id, $user_ids);
        if ($result) {
          echo 'Class ID updated successfully.';
        } else {
          echo 'Error updating Class ID.';
        }
      }

    // in your controller file
    public function delete_multiple() {
        $ids = $this->input->post('ids');
        $this->Users_model->delete_multiple($ids); // call a model method to delete the selected rows
        echo 'success'; // return a response to the AJAX request
    }


    public function validate_email()
    {
        $email = $this->input->post('email');
        $result = $this->Users_model->validate_email($email);
        if ($result) {
            // Email already exists in database
            $response['status'] = false;
        } else {
            // Email is available
            $response['status'] = true;
        }
        echo json_encode($response);
    }
    
    public function get_courses()
    {
        $courses = $this->Users_model->get_courses();
        echo json_encode($courses);
    }
    public function get_classes()
    {
        $classes = $this->Users_model->get_classes();
        echo json_encode($classes);
    }
    public function get_year_level()
    {
        $year_level = $this->Users_model->get_year_level();
        echo json_encode($year_level);
    }

    
}
