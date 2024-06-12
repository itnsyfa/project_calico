<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
        $this->load->model('Rawat_model');
        $this->load->model('Hewan_model');
        $this->load->model('Jasa_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Pelayanan Hospitalisasi";
        $data['rawat'] = $this->Rawat_model->get();
        $data['rawat'] = $this->Rawat_model->getWithHewan();
        $this->load->view("layout/header", $data);
        $this->load->view("rawat/vw_rawat", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Data Layanan Hospitalisasi";
        $data['list_hewan'] = $this->Hewan_model->selectDataHewan();
        $data['therapies'] = $this->Jasa_model->get_all_therapies();
        $data['random_string'] = bin2hex(random_bytes(4));
        $this->load->view("layout/header", $data);
        $this->load->view("rawat/vw_tambah_rawat", $data);
        $this->load->view("layout/footer", $data);
    }

    public function get_jasa_harga()
    {
        $id_jasa = $this->input->post('id_jasa');
        $jasa = $this->Jasa_model->get_jasa_by_id($id_jasa);
        if ($jasa) {
            // Jika berhasil, kembalikan data jasa dalam format JSON
            echo json_encode($jasa);
        } else {
            // Jika tidak berhasil, kembalikan respon error atau pesan yang sesuai
            echo json_encode(array('error' => 'Jasa tidak ditemukan'));
        }
    }


    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Data Rawat";
        $data['rawat'] = $this->Rawat_model->getWithHewanById($id); // Menggunakan fungsi baru untuk mengambil data dengan hewan berdasarkan ID
        // $this->load->view("layout/header", $data);
        $this->load->view("rawat/vw_detail_rawat", $data);
        // $output = $this->load->view("rawat/vw_detail_rawat", $data, true);
        // echo $output;
        // $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Rawat_model->delete($id);
        redirect('Rawat');
    }
    function upload()
    {
        // Ambil data dari form
        $selected_jasa = $this->input->post('jasa'); // Daftar jasa yang dipilih
        $id_hewan = $this->input->post('inNamaHewan');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $diagnosa = $this->input->post('diagnosa');
        $berat_badan = $this->input->post('berat_badan');
        $suhu_badan = $this->input->post('suhu_badan');
        $gejala_klinis = $this->input->post('gejala_klinis');
        $perawatan = $this->input->post('perawatan');
        $dokter = $this->input->post('dokter');
        $tgl_diberi_obat = $this->input->post('tgl_diberi_obat');
        $waktu = $this->input->post('waktu');
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status');
        $tanggal_keluar = $this->input->post('tanggal_keluar');

        // Hitung total harga dari jasa yang dipilih
        $harga = 0;
        foreach ($selected_jasa as $jasa_id) {
            $jasa = $this->Jasa_model->get_jasa_by_id($jasa_id);
            if ($jasa) {
                $harga += $jasa['harga'];
            }
        }

        // Buat data yang akan dimasukkan ke dalam database
        $data = [
            // 'kode_rawat' => $this->input->post('kode_rawat'),
            'id_hewan' => $id_hewan,
            'tanggal_masuk' => $tanggal_masuk,
            'diagnosa' => $diagnosa,
            'berat_badan' => $berat_badan,
            'suhu_badan' => $suhu_badan,
            'gejala_klinis' => $gejala_klinis,
            'perawatan' => $perawatan,
            'dokter' => $dokter,
            'tgl_diberi_obat' => $tgl_diberi_obat,
            'waktu' => $waktu,
            'keterangan' => $keterangan,
            'therapy' => implode(', ', $selected_jasa),
            'harga' => $harga, // Tambahkan total harga ke dalam data
            'status' => $status,
            'tanggal_keluar' => $tanggal_keluar,
        ];

        // Masukkan data ke dalam database
        $this->Rawat_model->insert($data);

        // Setelah data dimasukkan, kembalikan ke halaman Rawat
        $this->session->set_flashdata('success', 'Data <strong>Rawat</strong> Berhasil Ditambah!');
        redirect('Rawat');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Rawat";
        $data['list_hewan'] = $this->Hewan_model->selectDataHewan();
        $data['rawat'] = $this->Rawat_model->getById($id);
        $data['therapies'] = $this->Jasa_model->get_all_therapies();
        $data['random_string'] = bin2hex(random_bytes(4));


        // Tambahkan fungsi untuk mengambil data jasa yang dipilih oleh rawat tersebut
        $selected_therapy_ids = explode(', ', $data['rawat']['therapy']);
        $data['selected_therapies'] = [];
        foreach ($selected_therapy_ids as $therapy_id) {
            $data['selected_therapies'][] = $this->Jasa_model->get_jasa_by_id($therapy_id);
        }

        $this->load->view("layout/header");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');

        $this->load->view("rawat/vw_ubah_rawat", $data);
        $this->load->view("layout/footer");
    }

    public function update()
    {
        $id = $this->input->post('id_rawat');

        // Ambil data therapy yang dipilih dari input
        $therapy_selected = $this->input->post('therapy');

        // Ubah data therapy menjadi format yang sesuai untuk disimpan dalam database
        $therapy = implode(', ', $therapy_selected);

        // Hitung total harga dari jasa yang dipilih
        $total_harga = 0;
        foreach ($therapy_selected as $therapy_id) {
            $jasa = $this->Jasa_model->get_jasa_by_id($therapy_id);
            if ($jasa) {
                $total_harga += $jasa['harga'];
            }
        }

        $data = [
            'id_rawat' => $this->input->post('id_rawat'),
            'id_hewan' => $this->input->post('inNamaHewan'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'diagnosa' => $this->input->post('diagnosa'),
            'berat_badan' => $this->input->post('berat_badan'),
            'suhu_badan' => $this->input->post('suhu_badan'),
            'gejala_klinis' => $this->input->post('gejala_klinis'),
            'perawatan' => $this->input->post('perawatan'),
            'dokter' => $this->input->post('dokter'),
            'tgl_diberi_obat' => $this->input->post('tgl_diberi_obat'),
            'waktu' => $this->input->post('waktu'),
            'keterangan' => $this->input->post('keterangan'),
            'therapy' => $therapy,
            'status' => $this->input->post('status'),
            'tanggal_keluar' => $this->input->post('tanggal_keluar'),
            'harga' => $total_harga, // Tambahkan total harga ke dalam data
        ];

        $this->Rawat_model->update(['id_rawat' => $id], $data);

        $this->session->set_flashdata('success', 'Data <strong>Rawat</strong> Berhasil Diubah!');
        redirect('Rawat');
    }
}
