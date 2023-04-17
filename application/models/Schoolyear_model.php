<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolyear_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_current_school_year()
    {
        $this->db->select('school_year');
        $this->db->from('tbl_school_year');
        $this->db->where('status', 'active');
        $query = $this->db->get();
        return $query->row_array();
    } 
    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('tbl_school_year');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_sy($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_school_year');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_sy($data)
    {
        $this->db->insert('tbl_school_year', $data);
        $ad =  $this->db->insert_id();
        $log = array(
            'activity' => 'Created New School Year',
            'details' => ''.$this->session->userdata('user')['username'].' Created School Year -'.$data['school_year'].'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($ad){
            $this->db->insert('tbl_logs', $log);
        }
        return $ad;
    }

    // public function update_sy($id, $data)
    // {
    //     $this->db->trans_start();
    
    // // Set all rows to inactive
    // $this->db->set('status', 'inactive');
    // $this->db->update('tbl_school_year');
    // $this->db->set('school_year', $data['school_year']);
    // // Set the row with the specified ID to active
    // $this->db->set('status', 'active');
    // $this->db->where('id', $id);
    // $this->db->update('tbl_school_year');
    
    // $this->db->trans_complete();
    // return $this->db->trans_status();
    // }
    public function get_active_sy()
    {
        // Assuming you have a database table named 'schoolyears'
        $this->db->select('*');
        $this->db->from('tbl_school_year');
        $this->db->where('status', 'active');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Return the row as an array
            return $query->row_array();
        } else {
            // Return false if no active row found
            return false;
        }
    }
    public function update_other_sy_statuses($id, $status) {
        // Set status to inactive for all records with the same ID except the current one
        $this->db->where('id !=', $id); // Exclude the current record
        $this->db->where('status', 'active'); // Update only active records
        $up = $this->db->update('tbl_school_year', array('status' => $status, 'updated_at' => date('Y-m-d H:i:s')));
        $log = array(
            'activity' => 'Updated School Year',
            'details' => ''.$this->session->userdata('user')['username'].' Updated School Year - ID : '.$id.' to '.$status.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
    }


    // ...
    public function update_sy($id, $data)
    {
        $this->db->where('id', $id);
        $up = $this->db->update('tbl_school_year', $data);
        $log = array(
            'activity' => 'Updated School Year',
            'details' => ''.$this->session->userdata('user')['username'].' Updated School Year - ID : '.$id.' to '.$data['school_year'].'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
        return $up;
    }
    public function update_sy_status($id, $data)
    {
        $this->db->where('id', $id);
        $up =  $this->db->update('tbl_school_year', $data);
        $log = array(
            'activity' => 'Updated School Year',
            'details' => ''.$this->session->userdata('user')['username'].' Updated School Year - ID : '.$id.' to '.$data['status'].'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
        return $up;
    }


    public function delete_sy($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('tbl_school_year');
        $log = array(
            'activity' => 'Deleted School Year',
            'details' => ''.$this->session->userdata('user')['username'].' Deleted School Year ID : '.$id.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($del){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->affected_rows();
    }

    public function validate_email($email)
    {
        $query = $this->db->get_where('tbl_school_year', array('email' => $email));
        return ($query->num_rows() > 0) ? true : false;
    }
    
    public function get_all_sy_search($search)
    {
    $this->db->select('*');
    $this->db->from('tbl_school_year');
    if (!empty($search)) {
        $this->db->like('school_year', $search);
    }
    $query = $this->db->get();
    return $query->result();
    }

    public function get_courses()
    {
    $query = $this->db->get('tbl_course');
    return $query->result();
    }

    public function get_year_level()
    {
    $query = $this->db->get('tbl_year_level');
    return $query->result();
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_school_year');
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_school_year');
        if (!empty($search)) {
            $this->db->like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
}