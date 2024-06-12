<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat_model extends CI_Model
{
    public $table = 'rawat';
    public $id = 'rawat.id';
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
        $this->db->where('id_rawat', $id); // Menambahkan kondisi where untuk memfilter berdasarkan id
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
        $this->db->where('id_rawat', $id); // Menggunakan 'id_produk' sebagai klausa WHERE
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }


    public function getWithHewan()
    {
        $this->db->select('rawat.*, hewan.nama_hewan, GROUP_CONCAT(jasa.nama_jasa) as nama_jasa');
        $this->db->from('rawat');
        $this->db->join('hewan', 'rawat.id_hewan = hewan.id_hewan');
        $this->db->join('jasa', 'jasa.id_jasa = rawat.therapy', 'left'); // Menggunakan left join untuk memastikan semua rawat terpilih
        $this->db->group_by('rawat.id_rawat');
        return $this->db->get()->result_array();
    }


    public function getWithHewanById($id)
    {
        $this->db->select('rawat.*, hewan.nama_hewan');
        $this->db->from('rawat');
        $this->db->join('hewan', 'rawat.id_hewan = hewan.id_hewan');
        $this->db->where('rawat.id_rawat', $id); // Menyaring berdasarkan ID rawat
        return $this->db->get()->row_array(); // Menggunakan row_array() karena kita hanya mengambil satu baris data
    }

    public function getWithJasa()
    {
        $this->db->select('rawat.*, jasa.nama_jasa');
        $this->db->from('rawat');
        $this->db->join('jasa', 'rawat.therapy = jasa.id_jasa');
        return $this->db->get()->result_array();
    }

    public function lihat_nama_rawat($kode_rawat)
    {
        $this->db->select('rawat.*, hewan.nama_hewan, GROUP_CONCAT(jasa.nama_jasa ORDER BY jasa.nama_jasa SEPARATOR ", ") as nama_jasa');
        $this->db->from('rawat');
        $this->db->join('hewan', 'hewan.id_hewan = rawat.id_hewan');
        $this->db->join('jasa', 'FIND_IN_SET(jasa.id_jasa, rawat.therapy) > 0', 'left');
        $this->db->where('rawat.id_rawat', $kode_rawat);
        return $this->db->get()->row();
    }
    
    public function get_therapy_details($kode_rawat) {
        // Get the rawat record and join with hewan to get nama_hewan
        $this->db->select('rawat.*, hewan.nama_hewan');
        $this->db->from('rawat');
        $this->db->join('hewan', 'rawat.id_hewan = hewan.id_hewan', 'left');
        $this->db->where('rawat.id_rawat', $kode_rawat);
        $query = $this->db->get();
        $result = $query->row_array();
        
        if (!$result) {
            return [];
        }

        $therapy_ids = explode(',', $result['therapy']);

        // Get jasa details based on therapy IDs
        $this->db->select('id_jasa, nama_jasa, harga');
        $this->db->from('jasa');
        $this->db->where_in('id_jasa', $therapy_ids);
        $jasa_query = $this->db->get();
        $jasa_details = $jasa_query->result_array();

        $result['jasa_details'] = $jasa_details;

        return $result;
    }

    public function semua_rawat()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
