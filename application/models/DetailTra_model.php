<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailTra_model extends CI_Model
{
	public $table = 'detail_transaksi';
	public $id = 'detail_transaksi';
	public function __construct()
	{
		parent::__construct();
	}
	public function tambah($data)
	{
		return $this->db->insert_batch($this->table, $data);
	}

	public function lihat_no_penjualan($no_transaksi)
	{
		return $this->db->get_where($this->table, ['no_transaksi' => $no_transaksi])->result();
	}

	public function hapus($no_transaksi)
	{
		return $this->db->delete($this->table, ['no_transaksi' => $no_transaksi]);
	}
}
