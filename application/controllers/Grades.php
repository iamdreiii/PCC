<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }
    public function getgrade()
    {
        $data['data'] = $this->Grades_model->getgrade( $stid =5);
        var_dump($data['data']);
        //echo $data;
    }
}