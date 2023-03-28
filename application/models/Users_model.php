<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_user($data)
    {
        $this->db->insert('tbl_user', $data);
        return $this->db->insert_id();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_user', $data);
        return $this->db->affected_rows();
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_user');
        return $this->db->affected_rows();
    }
    
    // in your model file
    public function delete_multiple($ids) {
        $this->db->where_in('id', $ids);
        $this->db->delete('tbl_user');
    }

    public function update_class_id_multiple($ids, $class_id) {
        $this->db->where_in('id', $ids);
        $this->db->update('tbl_user', array('class_id' => $class_id));
    }

    public function validate_email($email)
    {
        $query = $this->db->get_where('tbl_user', array('email' => $email));
        return ($query->num_rows() > 0) ? true : false;
    }
    // , $filter_class, $filter_year_level, $filter_gender
    public function get_all_users_search($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_user');
    if (!empty($search)) {
        $this->db->like('school_id', $search);
        $this->db->or_like('fname', $search);
        $this->db->or_like('mname', $search);
        $this->db->or_like('lname', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('class_id', $search);
        $this->db->or_like('year_level', $search);
        $this->db->or_like('gender', $search);
        $this->db->or_like('course', $search);
        $this->db->or_like('address', $search);
        $this->db->or_like('enrollment_status', $search);
    }
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }

    public function get_courses()
    {
    $query = $this->db->get('tbl_course');
    return $query->result();
    }
    public function get_classes()
    {
    $query = $this->db->get('tbl_class');
    return $query->result();
    }
    public function update_class_id($class_id, $user_ids) 
    {
        $data = array('class_id' => $class_id);
        $this->db->where_in('id', $user_ids);
        $result = $this->db->update('tbl_user', $data);
        return $result;
    }
    public function get_year_level()
    {
    $query = $this->db->get('tbl_year_level');
    return $query->result();
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_user');
    }
    // $filter_class = null, $filter_year_level = null, $filter_gender = null
    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        if (!empty($search)) {
            $this->db->like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            // $this->db->or_like('class_id', $filter_class);
            // $this->db->or_like('year_level', $filter_year_level);
            // $this->db->or_like('gender', $filter_gender);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_comment_filter_dict()
    {
        $query =  $this->db->query('SELECT word FROM tbl_comment_filter_dict');
        return $query->result();
    }

    // FILTERS
    public function add_words($word) {
        $data = array(
            'word' => $word
        );
        $this->db->insert('tbl_comment_filter_dict', $data);
    }

    public function get_words() {
        $query = $this->db->select('word')->from('tbl_comment_filter_dict')->get();
        return $query;
    }

    // DASH DATA
    public function count_all_student()
    {
        return $this->db->count_all('tbl_user');
    }

    public function count_all_staff()
    {
        return $this->db->count_all('tbl_staff');
    }

}
