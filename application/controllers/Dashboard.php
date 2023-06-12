<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    //   $this->check_session();
    }
    // public function check_session()
    // {
        
    //     // Get the last activity time from the session
    //     $last_activity = $this->session->userdata('user')['last_activity'];
    //     //var_dump($last_activity);
    //     // Check if the user is inactive for more than the session timeout period
    //     if (time() - $last_activity > $this->config->item('sess_timeout'))
    //     {
    //         // Update the user's active status to 0
    //         $user_id = $this->session->userdata('user')['id'];
    //         $this->db->where('id', $user_id);
    //         $this->db->update('tbl_staff', array('active_status' => 'inactive'));
            
    //         // Destroy the session and logout the user
    //         $this->session->sess_destroy();
    //         redirect('staff');
    //     }
    //     else
    //     {
    //         $user_id = $this->session->userdata('user')['id'];
    //         $this->db->where('id', $user_id);
    //         $this->db->update('tbl_staff', array('last_activity' => time()));
    //         // Update the last activity time in the session
    //         $this->session->set_userdata('user.last_activity', time());
    //     }
    // }
	public function index()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff')
        {
            $page = 'dashboard';
            if(!file_exists(APPPATH.'views/admin/dashboard/'.$page.'.php')){
                show_404();
            }
            $data['staffcount'] = $this->Users_model->count_all_staff();
            $data['school_year'] = $this->Schoolyear_model->get_current_school_year();
            $data['usercount'] = $this->Users_model->count_all_student();
            $data['usercountbse'] = $this->Users_model->getbsetotal();
            $data['usercountbpa'] = $this->Users_model->getbpatotal();
            $data['courses'] = $this->Users_model->getcourses();
            $data['stud1'] = $this->Users_model->countfirst();
            $data['stud2'] = $this->Users_model->countsecond();
            $data['stud3'] = $this->Users_model->countthird();
            $data['stud4'] = $this->Users_model->countfourth();
            $this->load->view('admin/dashboard/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
public function fetchChartData()
    {
        $this->load->model('Dashboard_model');
        $courses = $this->Dashboard_model->get_all_courses();
        $studentCounts = $this->Dashboard_model->get_student_count_by_course_and_year();

        $chartData = [];
        $labels = [];
        $courseKeys = [];
        $courseLabels = [];
        
        // Prepare course keys and labels dynamically
        foreach ($courses as $index => $course) {
            $courseKeys[] = 'a_course' . ($index + 1);
            $courseLabels[] = $course->course;
        }

        foreach ($studentCounts as $year => $courseData) {
            $yearData = ['y' => $year];
            $labels[] = $year;
            foreach ($courses as $index => $course) {
                $count = isset($courseData[$course->course]) ? $courseData[$course->course] : 0;
                $yearData['a_course' . ($index + 1)] = $count;
            }
            $chartData[] = $yearData;
        }

        $this->output->set_content_type('application/json')->set_output(json_encode(['data' => $chartData, 'labels' => $labels, 'courseKeys' => $courseKeys, 'courseLabels' => $courseLabels]));
    }



    
}
