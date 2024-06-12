<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public $table = 'produk';
    public $id = 'produk.id';
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
        $this->db->where('id_produk', $id); // Menambahkan kondisi where untuk memfilter berdasarkan id
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
        $this->db->where('id_produk', $id); // Menggunakan 'id_produk' sebagai klausa WHERE
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function jumlah()
    {
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function lihat_stok()
    {
        $this->db->where('stok >', 1);
        $query = $this->db->get($this->table);
        return $query->result();
    }


    public function min_stok($stok, $nama_produk)
    {
        $query = $this->db->set('stok', 'stok-' . $stok, false);
        $query = $this->db->where('nama_produk', $nama_produk);
        $query = $this->db->update($this->table);
        return $query;
    }
    public function lihat_nama_barang($nama_produk)
    {
        $query = $this->db->select('*');
        $query = $this->db->where(['nama_produk' => $nama_produk]);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function get_categories()
    {
        // Ambil semua kategori yang unik dari tabel produk
        $this->db->distinct();
        $this->db->select('kategori');
        $query = $this->db->get('produk');

        return $query->result();
    }

    public function get_filtered_products($kategori = null)
    {
        if (!empty($kategori)) {
            $this->db->where('kategori', $kategori);
        }

        $query = $this->db->get('produk');
        return $query->result_array(); // Menggunakan result_array untuk format array
    }

    public function updateStok($kode_produk, $stok_tambah)
    {
        $this->db->set('stok', 'stok+' . (int)$stok_tambah, FALSE);
        $this->db->where('kode_produk', $kode_produk);
        $this->db->update('produk');
    }

}
