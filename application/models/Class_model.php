<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_subject()
    {
        $this->db->select('*');
        $this->db->from('tbl_class');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_class($data)
    {
        $this->db->insert('tbl_class', $data);
        return $this->db->insert_id();
    }

    public function update_class($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_class', $data);
    }
    public function get_class($id)
    {
        
        $this->db->select('*');
        $this->db->from('tbl_class');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_class($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_class');
        return $this->db->affected_rows();
    }
    public function get_all_class_search($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_class');
    $this->db->order_by('id', 'asc');
    if (!empty($search)) {
        $this->db->like('name', $search);
    }
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }

    
    public function count_all()
    {
        return $this->db->count_all('tbl_class');
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_class');
        if (!empty($search)) {
            $this->db->like('name', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function fetch_search_data($query)
    {
    $this->db->like('name', $query);
    $query = $this->db->get('tbl_class');
    if($query->num_rows() > 0)
    {
    foreach($query->result_array() as $row)
    {
        $output[] = array(
        'title'  => $row["subcode"],
        'path'  => $row["path"],
        'description'  => $row["description"]
        );
    }
    echo json_encode($output);
    }
    }
}