<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grooming extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
        $this->load->model('Groom_model');
        $this->load->model('Jasa_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Grooming";
        $data['list_jasa'] = $this->Jasa_model->selectDataJasa();
        $data['groom'] = $this->Groom_model->getWithJasa();
        $this->load->view("layout/header", $data);
        $this->load->view("groom/vw_groom", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Grooming";
        $data['list_jasa'] = $this->Jasa_model->selectDataJasa();
        $this->load->view("layout/header", $data);
        $this->load->view("groom/vw_tambah_groom", $data);
        $this->load->view("layout/footer", $data);
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Grooming";
        $data['groom'] = $this->Groom_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("groom/vw_detail_groom", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Groom_model->delete($id);
        redirect('Grooming');
    }

    public function upload()
    {
        // Ambil data input dari form
        $nama_pemilik = $this->input->post('nama_pemilik');
        $tanggal = $this->input->post('tanggal');
        $qty = $this->input->post('qty');
        $id_jasa = $this->input->post('inNamaJasa');
        $no_hp = $this->input->post('no_hp');
        $keterangan = $this->input->post('keterangan');

        // Dapatkan harga jasa
        $jasa = $this->Jasa_model->get_jasa_by_id($id_jasa);
        $harga_groom = $jasa ? $jasa['harga'] * $qty : 0;

        // Buat array data untuk disimpan
        $data = [
            'nama_pemilik' => $nama_pemilik,
            'tanggal' => $tanggal,
            'qty' => $qty,
            'id_jasa' => $id_jasa,
            'no_hp' => $no_hp,
            'keterangan' => $keterangan,
            'harga_groom' => $harga_groom,
        ];

        // Simpan data ke database
        $result = $this->Groom_model->insert($data);

        // Inisialisasi respons
        $response = array();

        if ($result) {
            // Jika penyimpanan berhasil
            $response['status'] = 'success';
            $response['message'] = 'Data Grooming berhasil ditambahkan.';

            // Set flashdata untuk notifikasi di halaman berikutnya
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Grooming Berhasil Ditambah!</div>');

            // Kirimkan respons dalam bentuk JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Jika terjadi kesalahan saat penyimpanan
            $response['status'] = 'error';
            $response['message'] = 'Terjadi kesalahan saat menyimpan data.';

            // Kirimkan respons dalam bentuk JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }


    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Grooming";
        $data['groom'] = $this->Groom_model->getById($id);
        $data['list_jasa'] = $this->Jasa_model->selectDataJasa();
        $this->load->view("layout/header", $data);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->load->view("groom/vw_ubah_groom", $data);
        $this->load->view("layout/footer", $data);
    }

    public function update()
    {
        $id = $this->input->post('id'); // Ambil ID grooming yang akan diubah

        // Ambil data input dari form
        $nama_pemilik = $this->input->post('nama_pemilik');
        $tanggal = $this->input->post('tanggal');
        $qty = $this->input->post('qty');
        $id_jasa = $this->input->post('inNamaJasa');
        $no_hp = $this->input->post('no_hp');
        $keterangan = $this->input->post('keterangan');

        // Dapatkan harga jasa
        $jasa = $this->Jasa_model->get_jasa_by_id($id_jasa);
        $harga_groom = $jasa ? $jasa['harga'] * $qty : 0;

        // Buat array data baru untuk update
        $data = [
            'nama_pemilik' => $nama_pemilik,
            'tanggal' => $tanggal,
            'qty' => $qty,
            'id_jasa' => $id_jasa,
            'no_hp' => $no_hp,
            'keterangan' => $keterangan,
            'harga_groom' => $harga_groom,
        ];

        // Lakukan update data grooming
        $this->Groom_model->update(['id_groom' => $id], $data);

        // Setelah update selesai, lakukan pengalihan (redirect) ke halaman yang sesuai
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Grooming Berhasil Diubah!</div>');
        redirect('Grooming');
    }

    public function get_jasa_harga()
    {
        $id_jasa = $this->input->post('id_jasa');
        $jasa = $this->Jasa_model->get_jasa_by_id($id_jasa);
        if ($jasa) {
            echo json_encode($jasa);
        } else {
            echo json_encode(array('error' => 'Jasa tidak ditemukan'));
        }
    }
}
