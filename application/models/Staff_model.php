<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_staff($search)
    {
    $this->db->select('*');
    $this->db->from('tbl_staff');
    if (!empty($search)) {
        $this->db->like('username', $search);
        $this->db->or_like('type', $search);
        $this->db->or_like('active_status', $search);
    }
    $query = $this->db->get();
    return $query->result();
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_staff');
        if (!empty($search)) {
            $this->db->like('username', $search);
            $this->db->or_like('type', $search);
            $this->db->or_like('active_status', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_staff');
    }

    // CRUD
    public function add($data)
    {
        $this->db->insert('tbl_staff', $data);
        $ad =  $this->db->insert_id();
        $log = array(
            'activity' => 'Added New Staff',
            'details' => ''.$this->session->userdata('user')['username'].' Added Staff -'.$data['username'].'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($ad){
            $this->db->insert('tbl_logs', $log);
        }
        return $ad;
    }

    public function get($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_staff');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $up = $this->db->update('tbl_staff', $data);
        $log = array(
            'activity' => 'Updated Staff',
            'details' => ''.$this->session->userdata('user')['username'].' Updated Staff- ID : '.$id.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
        return $up;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('tbl_staff');
        $log = array(
            'activity' => 'Deleted Staff',
            'details' => ''.$this->session->userdata('user')['username'].' Deleted Staff ID : '.$id.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($del){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->affected_rows();
    }

}