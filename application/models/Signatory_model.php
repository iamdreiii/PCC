<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signatory_model extends CI_Model 
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
    public function get_all_signatory_search($search)
    {
    $this->db->select('*');
    $this->db->from('tbl_signatory');
    if (!empty($search)) {
        $this->db->like('fullname', $search);
        $this->db->or_like('position', $search);
    }
    $query = $this->db->get();
    return $query->result();
    }

    public function get_signatory($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_signatory');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_signatory($data)
    {
        $this->db->insert('tbl_signatory', $data);
        $ad =  $this->db->insert_id();
        $log = array(
            'activity' => 'Created New Signatory',
            'details' => ''.$this->session->userdata('user')['username'].' Created Signatory -'.$data['fullname'].'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($ad){
            $this->db->insert('tbl_logs', $log);
        }
        return $ad;
    }
    public function get_active_sy()
    {
        $this->db->select('*');
        $this->db->from('tbl_signatory');
        $this->db->where('status', 'active');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function update_other_sy_statuses($id, $status) {
        $this->db->where('id !=', $id); 
        $this->db->where('status', 'active'); 
        $up = $this->db->update('tbl_signatory', array('status' => $status, 'updated_at' => date('Y-m-d H:i:s')));
        $log = array(
            'activity' => 'Updated Signatory',
            'details' => ''.$this->session->userdata('user')['username'].' Updated Signatory - ID : '.$id.' to '.$status.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
    }

    public function update_signatory($id, $data)
    {
        $this->db->where('id', $id);
        $up = $this->db->update('tbl_signatory', $data);
        $log = array(
            'activity' => 'Updated Signatory',
            'details' => ''.$this->session->userdata('user')['username'].' Updated Signatory - ID : '.$id.' to '.$data['fullname'].'',
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
        $up =  $this->db->update('tbl_signatory', $data);
        $log = array(
            'activity' => 'Updated Signatory',
            'details' => ''.$this->session->userdata('user')['username'].' Updated Signatory - ID : '.$id.' to '.$data['status'].'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
        return $up;
    }


    public function delete_signatory($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('tbl_signatory');
        $log = array(
            'activity' => 'Deleted Signatory',
            'details' => ''.$this->session->userdata('user')['username'].' Deleted Signatory ID : '.$id.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($del){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->affected_rows();
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_signatory');
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_signatory');
        if (!empty($search)) {
            $this->db->like('fullname', $search);
            $this->db->or_like('position', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
}