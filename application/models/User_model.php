<?php

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    public function create_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

}