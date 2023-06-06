<?php
// Staff_model.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function getStaffData($id) {
    // Fetch data from the 'tbl_staff' table for the specified user ID
    $this->db->where('id', $id);
    $query = $this->db->get('tbl_staff');
    return $query->row();
  }

  public function updateStaffData($id, $data) 
  {
    $this->db->where('id', $id);
    $this->db->update('tbl_staff', $data);
    return $this->db->affected_rows();
  }

  public function updateStaff($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_staff', $data);
    }
}
