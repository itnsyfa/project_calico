<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		// Cek apakah user sudah login
		if (!$this->session->userdata('auth')['isLoggedIn']) {
			redirect('auth');
		}

		$this->data = array();
		// if($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Produk_model', 'produk_model');
		$this->load->model('Transaksi_model', 'transaksi_model');
		$this->load->model('DetailTra_model', 'detailTra_model');
		$this->load->model('Rawat_model', 'rawat_model');
		$this->load->model('Groom_model', 'groom_model');
		$this->load->model('Jasa_model', 'jasa_model');
		$this->load->model('Laporan_model', 'laporan_model');
		// $this->data['aktif'] = 'transaksi';
	}

	public function index()
	{
		$data['title'] = "Data Transaksi";
		$data['all_penjualan'] = $this->transaksi_model->lihat();
		$this->load->view("layout/header", $data);
		$this->load->view('transaksi/vw_transaksi', $data);
		$this->load->view("layout/footer", $data);
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Transaksi';
		$data['all_barang'] = $this->produk_model->lihat_stok();
		$data['all_rawat'] = $this->rawat_model->semua_rawat();
		$data['all_groom'] = $this->groom_model->semua_groom();
		$data['all_jasa'] = $this->jasa_model->semua_jasa();
		$this->load->view("layout/header", $data);
		$this->load->view('transaksi/vw_tambah_transaksi', $data);
		$this->load->view("layout/footer", $data);
	}


	public function proses_tambah()
	{
		$jumlah_barang_dibeli = count($this->input->post('nama_barang_hidden'));

		$data_penjualan = [
			'no_transaksi' => $this->input->post('no_transaksi'),
			'nama_kasir' => $this->input->post('nama_kasir'),
			'tgl_penjualan' => $this->input->post('tgl_penjualan'),
			'jam_penjualan' => $this->input->post('jam_penjualan'),
			'total' => $this->input->post('total_hidden'),
		];

		$data_detail_penjualan = [];

		for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
			// Prepare detail data
			$detail_data = [
				'nama_produk' => $this->input->post('nama_barang_hidden')[$i],
				'no_transaksi' => $this->input->post('no_transaksi'),
				'harga' => $this->input->post('harga_barang_hidden')[$i],
				'jumlah_produk' => $this->input->post('jumlah_hidden')[$i],
				'satuan' => $this->input->post('satuan_hidden')[$i],
				'sub_total' => $this->input->post('sub_total_hidden')[$i],
			];

			// Push to array
			$data_detail_penjualan[] = $detail_data;

			// Min stok only if the product exists
			if ($this->produk_model->lihat_nama_barang($detail_data['nama_produk'])) {
				$this->produk_model->min_stok($detail_data['jumlah_produk'], $detail_data['nama_produk']) or die('gagal min stok');
			}
		}

		// Insert into database
		if ($this->transaksi_model->tambah($data_penjualan) && $this->detailTra_model->tambah($data_detail_penjualan)) {
			// Tambahkan data ke laporan pemasukan
			$data_laporan = [
				'tanggal' => date('Y-m-d', strtotime($data_penjualan['tgl_penjualan'])), // Pastikan format tanggal sesuai
				'jenis' => 'Pemasukan',
				'kategori' => 'Biaya Tidak langsung',
				'nominal' => $data_penjualan['total'],
				'keterangan' => 'Transaksi Penjualan',
				'gambar' => '' // Sesuaikan jika ada gambar yang diunggah
			];
			$this->load->model('Laporan_model');
			$this->Laporan_model->tambah($data_laporan);

			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
		} else {
			$this->session->set_flashdata('error', 'Gagal membuat invoice <strong>Penjualan</strong>.');
		}

		redirect('Transaksi');
	}


	public function detail($no_transaksi)
	{
		$data['title'] = 'Detail Penjualan';
		$data['transaksi'] = $this->transaksi_model->lihat_no_penjualan($no_transaksi);
		$data['all_detail_penjualan'] = $this->detailTra_model->lihat_no_penjualan($no_transaksi);

		$this->data['no'] = 1;
		$this->load->view("layout/header", $data);
		$this->load->view('transaksi/vw_detail', $data);
		$this->load->view("layout/footer", $data);
	}

	public function hapus($no_transaksi)
	{
		if ($this->transaksi_model->hapus($no_transaksi) && $this->detailTra_model->hapus($no_transaksi)) {
			$this->session->set_flashdata('success', 'Invoice Penjualan <strong>Berhasil</strong> Dihapus!');
			redirect('Transaksi');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penjualan <strong>Gagal</strong> Dihapus!');
			redirect('Transaksi');
		}
	}
	// public function get_all_barang()
	// {
	// 	$term = $this->input->get('term'); // Mengambil term pencarian dari query string
	// 	$this->db->like('nama_produk', $term);
	// 	$this->db->limit(10); // Batasi jumlah hasil pencarian
	// 	$query = $this->db->get('barang');
	// 	$result = $query->result();

	// 	$data = [];
	// 	foreach ($result as $row) {
	// 		$data[] = [
	// 			'id' => $row->id,
	// 			'text' => $row->nama_produk,
	// 		];
	// 	}

	// 	echo json_encode($data);
	// }


	public function get_all_barang()
	{
		$data = $this->produk_model->lihat_nama_barang($_POST['nama_produk']);
		echo json_encode($data);
	}

	public function get_data_rawat()
	{
		$data = $this->rawat_model->get_therapy_details($_POST['kode_rawat']);
		echo json_encode($data);
	}

	public function get_data_groom()
	{
		$data = $this->groom_model->lihat_nama_groom($_POST['kode_groom']);
		echo json_encode($data);
	}

	public function get_jasa_by_id()
	{
		$data = $this->jasa_model->lihat_nama_jasa($_POST['id_jasa']);
		echo json_encode($data);
	}


	// Controller Transaksi.php
	// public function get_data_rawat($id_rawat)
	// {
	// 	$this->load->model('Rawat_model');
	// 	$data = $this->rawat_model->get_data_rawat($id_rawat);
	// 	echo json_encode($data);
	// }


	public function keranjang_barang()
	{
		$this->load->view('transaksi/vw_keranjang');
	}

	public function export()
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_penjualan'] = $this->transaksi_model->lihat();
		$this->data['title'] = 'Laporan Data Penjualan';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		// Menggunakan variabel $this->data sebagai parameter untuk memuat view
		$html = $this->load->view('transaksi/vw_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}


	public function export_detail($no_transaksi)
	{
		$dompdf = new Dompdf();
		$data['title'] = 'Calico Petshop';
		$data['transaksi'] = $this->transaksi_model->lihat_no_penjualan($no_transaksi);
		$data['all_detail_penjualan'] = $this->detailTra_model->lihat_no_penjualan($no_transaksi);
		$this->data['title'] = 'Laporan Detail Penjualan';
		$this->data['no'] = 1;

		// Set ukuran kertas dan orientasi
		$dompdf->setPaper('A7', 'portrait');

		// Load view untuk struk kecil
		$html = $this->load->view('transaksi/vw_detail_report', $data, true);

		// Render dan tampilkan struk
		$dompdf->loadHtml($html);
		$dompdf->render();
		$dompdf->stream('Struk_' . $no_transaksi . '.pdf', array("Attachment" => false));
	}
}
