<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Groom_model extends CI_Model
{
    public $table = 'grooming';
    public $id = 'grooming.id';
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
        $this->db->where('id_groom', $id); // Menambahkan kondisi where untuk memfilter berdasarkan id
        $query = $this->db->get();
        return $query->row_array();
    }

    public function selectDataHewan()
    {
        $this->db->select('nama_hewan, id_hewan');
        $this->db->order_by('nama_hewan', 'ASC');
        return $this->db->get('hewan')->result_array();
    }

    public function getWithJasa()
    {
        $this->db->select('grooming.*, jasa.nama_jasa');
        $this->db->from('grooming');
        $this->db->join('jasa', 'grooming.id_jasa = jasa.id_jasa');
        return $this->db->get()->result_array();
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
        $this->db->where('id_groom', $id); // Menggunakan 'id_produk' sebagai klausa WHERE
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function semua_groom()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function lihat_nama_groom($kode_groom)
    {
        $this->db->select('nama_pemilik, qty, harga_groom');
        $this->db->from('grooming'); 
        $this->db->where('id_groom', $kode_groom);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); 
        } else {
            return null;
        }
    }
}
