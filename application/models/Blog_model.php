<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_blog()
    {
        $this->db->select('*');
        $this->db->from('tbl_announcements');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_videos() {
        // Fetch the videos from the database
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('tbl_announcements');
        
        // Return the videos as an array of objects
        return $query->result();
    }
    public function get_blog($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_announcements');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_all_videos() {
        $query = $this->db->get('tbl_announcements');
        return $query->result();
    }

    public function add_blog($data)
    {
        $this->db->insert('tbl_announcements', $data);
        return $this->db->insert_id();
    }

    public function update_blog($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_announcements', $data);
    }

    public function delete_blog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_announcements');
        return $this->db->affected_rows();
    }
    public function get_all_blog_search($search)
    {
    $this->db->select('*');
    $this->db->from('tbl_announcements');
    if (!empty($search)) {
        $this->db->like('title', $search);
        $this->db->like('description', $search);
    }
    $query = $this->db->get();
    return $query->result();
    }

    
    public function count_all()
    {
        return $this->db->count_all('tbl_announcements');
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_announcements');
        if (!empty($search)) {
            $this->db->like('title', $search);
            $this->db->or_like('description', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function fetch_search_data($query)
    {
    $this->db->like('title', $query);
    $this->db->like('description', $query);
    $query = $this->db->get('tbl_announcements');
    if($query->num_rows() > 0)
    {
    foreach($query->result_array() as $row)
    {
        $output[] = array(
        'title'  => $row["title"],
        'path'  => $row["path"],
        'description'  => $row["description"]
        );
    }
    echo json_encode($output);
    }
    }
}