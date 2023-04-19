<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogSetting extends CI_Controller {

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
            $page = 'blogsetting';
            if(!file_exists(APPPATH.'views/admin/blogsetting/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Blog Setting";
            $this->load->view('admin/blogsetting/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    // public function getstatus()
    // {
    //     $status = array();
    //     $social_media = $this->BlogSetting_model->get_all();
    //     foreach ($social_media as $media) {
    //         $status[$media->name] = $media->status;
    //     }
    //     echo json_encode($status);
    // }
    public function get_status() {
        $blogSetting = $this->db->get('tbl_blog_setting')->row_array();
        $data = array(
            'facebook' => $blogSetting['facebook'],
            'twitter' => $blogSetting['twitter'],
            'instagram' => $blogSetting['instagram'],
            'youtube' => $blogSetting['youtube']
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
    public function update_status()
    {
        // Retrieve the POST parameters
        $socialMedia = $this->input->post('social_media');
        $isChecked = $this->input->post('is_checked');

        // Validate the input
        if (!in_array($socialMedia, ['facebook', 'twitter', 'instagram', 'youtube'])) {
            echo 'Invalid social media platform';
            return;
        }

        // Convert the checkbox value to a boolean
        $isChecked = filter_var($isChecked, FILTER_VALIDATE_BOOLEAN);

        // Update the database
        $this->db->update('tbl_blog_setting', array($socialMedia => $isChecked ? 1 : 0));

        // Return a success response
        echo 'Status updated successfully';
    }

    public function fetchcolors() {
        $blogcolordata = $this->BlogSetting_model->fetchcolors();

        // Return the fetched data as JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($blogcolordata));
    }
    public function updatecolor()
    {
        $navbar_color = $this->input->post('navbar_color');
        $body_color = $this->input->post('body_color');
        $footer_color = $this->input->post('footer_color');

        $this->db->update('tbl_blog_setting', array('navbar_color' => $navbar_color, 'body_color' => $body_color, 'footer_color' => $footer_color));
        $blogcolordata = $this->BlogSetting_model->fetchcolors();
        header('Content-Type: application/json');
        echo json_encode($blogcolordata);
    }
    public function fetchblogdetails()
    {
        $blogdetailsdata = $this->BlogSetting_model->fetchblogdetails();

        // Return the fetched data as JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($blogdetailsdata));
    }
    public function updateblogdetails()
    {
        $title = $this->input->post('title');
        $subtitle = $this->input->post('subtitle');
        $footer = $this->input->post('footer');

        $this->db->update('tbl_blog_setting', array('title' => $title, 'subtitle' => $subtitle, 'footer' => $footer));
        $blogdetailsdata = $this->BlogSetting_model->fetchblogdetails();
        header('Content-Type: application/json');
        echo json_encode($blogdetailsdata);
    }
}