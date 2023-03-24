<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password){
        $query = $this->db->get_where('tbl_staff', array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }
}