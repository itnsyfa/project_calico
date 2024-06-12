<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $table = 'users';
    public $id = 'users.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBy()
    {
        $username = $this->session->userdata('username');
        if ($username) {
            $this->db->from($this->table);
            $this->db->where('username', $username);
            $query = $this->db->get();
            if ($query) {
                return $query->result_array();
            } else {
                // Penanganan error jika query gagal
                return false;
            }
        } else {
            // Penanganan error jika session tidak memiliki nilai username
            return false;
        }
    }
}
