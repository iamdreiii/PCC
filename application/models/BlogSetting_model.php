<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogSetting_model extends CI_Model 
{
    protected $table = 'tbl_links';
    public function __construct()
    {
        parent::__construct();
    }
    public function getSocialMediaLinks() {
        $query = $this->db->get('tbl_links');
        return $query->row_array(); 
    }
     public function fetchLinks() {
        // Fetch social media links from the database
        // Replace with your database query logic to fetch the links
        $query = $this->db->get('tbl_links')->row_array();

        // Assign fetched data to individual variables
        $facebook = isset($query['facebook']) ? $query['facebook'] : '';
        $twitter = isset($query['twitter']) ? $query['twitter'] : '';
        $instagram = isset($query['instagram']) ? $query['instagram'] : '';
        $youtube = isset($query['youtube']) ? $query['youtube'] : '';

        // Return the fetched data as an array
        return array(
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube
        );
    }
    public function get_all() {
        $query = $this->db->get('tbl_blog_setting');
        return $query->result();
      
    }
    public function update_status($facebook, $twitter, $instagram, $youtube) {
        $data = array(
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube
        );
        $this->db->update('tbl_blog_setting', $data);
    }
    public function fetchcolors() {
        // Fetch social media links from the database
        // Replace with your database query logic to fetch the links
        $query = $this->db->get('tbl_blog_setting')->row_array();

        // Assign fetched data to individual variables
        $navbar_color = isset($query['navbar_color']) ? $query['navbar_color'] : '';
        $body_color = isset($query['body_color']) ? $query['body_color'] : '';
        $footer_color = isset($query['footer_color']) ? $query['footer_color'] : '';

        // Return the fetched data as an array
        return array(
            'navbar_color' => $navbar_color,
            'body_color' => $body_color,
            'footer_color' => $footer_color
        );
    }
    public function fetchblogdetails()
    {
        $query = $this->db->get('tbl_blog_setting')->row_array();

        // Assign fetched data to individual variables
        $title = isset($query['title']) ? $query['title'] : '';
        $subtitle = isset($query['subtitle']) ? $query['subtitle'] : '';
        $footer = isset($query['footer']) ? $query['footer'] : '';

        // Return the fetched data as an array
        return array(
            'title' => $title,
            'subtitle' => $subtitle,
            'footer' => $footer
        );
    }


}