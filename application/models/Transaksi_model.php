<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public $table = 'transaksi';
    public $id = 'transaksi.id';
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

    public function lihat(){
		return $this->db->get($this->table)->result();
	} 

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_transaksi', $id); // Menambahkan kondisi where untuk memfilter berdasarkan id
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function jumlah(){
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	public function lihat_no_penjualan($no_transaksi){
		return $this->db->get_where($this->table, ['no_transaksi' => $no_transaksi])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->table, $data);
	}

	public function hapus($no_transaksi){
		return $this->db->delete($this->table, ['no_transaksi' => $no_transaksi]);
	}
}
