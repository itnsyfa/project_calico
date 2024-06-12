<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel_model extends CI_Model
{
    public $table = 'hotel';
    public $id = 'hotel.id';
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
        $this->db->where('id_hotel', $id); // Menambahkan kondisi where untuk memfilter berdasarkan id
        $query = $this->db->get();
        return $query->row_array();
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
        $this->db->where('id_hotel', $id); // Menggunakan 'id_produk' sebagai klausa WHERE
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }


    public function getWithHewanAndJasa()
    {
        $this->db->select('hotel.*, hewan.nama_hewan, hewan.nama_pemilik, jasa.nama_jasa');
        $this->db->from('hotel');
        $this->db->join('hewan', 'hotel.id_hewan = hewan.id_hewan');
        $this->db->join('jasa', 'hotel.id_jasa = jasa.id_jasa');
        return $this->db->get()->result_array();
    }
}
