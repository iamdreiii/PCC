<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Links extends CI_Controller {

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
            $page = 'links';
            if(!file_exists(APPPATH.'views/admin/link/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Links";
            $data['links'] = $this->Links_model->getSocialMediaLinks();
            $this->load->view('admin/link/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function fetchlinks() {
        $socialMediaData = $this->Links_model->fetchLinks();

        // Return the fetched data as JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($socialMediaData));
    }
    public function updateLinks()
    {
        // Retrieve the new links from the POST data
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $instagram = $this->input->post('instagram');
        $youtube = $this->input->post('youtube');
        $gmail = $this->input->post('gmail');

        // Update the links in the database
        // Replace with your database update logic
        // Example query: $this->db->update('social_media_links', array('facebook' => $facebook, 'twitter' => $twitter, 'instagram' => $instagram, 'youtube' => $youtube, 'gmail' => $gmail));
        $this->db->update('tbl_links', array('facebook' => $facebook, 'twitter' => $twitter, 'instagram' => $instagram, 'youtube' => $youtube, 'gmail' => $gmail));

        // Fetch the updated links from the database
        $links = $this->Links_model->fetchLinks();

        // Return the updated links as a JSON response
        header('Content-Type: application/json');
        echo json_encode($links);
    }

}