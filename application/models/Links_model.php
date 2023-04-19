<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Links_model extends CI_Model 
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
        $gmail = isset($query['gmail']) ? $query['gmail'] : '';

        // Return the fetched data as an array
        return array(
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'gmail' => $gmail
        );
    }


}