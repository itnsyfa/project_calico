<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jasa_model extends CI_Model
{
    public $table = 'jasa';
    public $id = 'jasa.id';
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
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_jasa', $id); // Menambahkan kondisi where untuk memfilter berdasarkan id
        $query = $this->db->get();
        return $query->row_array();
    }

    public function selectDataJasa()
    {
        $this->db->select('nama_jasa, id_jasa');
        $this->db->order_by('nama_jasa', 'ASC');
        return $this->db->get('jasa')->result_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('id_jasa', $id); // Menggunakan 'id_produk' sebagai klausa WHERE
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function get_all_therapies()
    {
        $query = $this->db->get('jasa'); // Pastikan tabel 'therapies' ada di database Anda
        return $query->result_array();
    }

    public function lihat_nama_jasa($id_jasa)
    {
        $query = $this->db->get_where('jasa', array('id_jasa' => $id_jasa));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_jasa_by_id($id_jasa)
    {
        $query = $this->db->get_where('jasa', array('id_jasa' => $id_jasa));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function semua_jasa()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
