<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
        $this->load->model('Hotel_model');
        $this->load->model('Jasa_model');
        $this->load->model('Hewan_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Cat Hotel";
        $data['hotel'] = $this->Hotel_model->get();
        $data['hotel'] = $this->Hotel_model->getWithHewanAndJasa();
        $this->load->view("layout/header", $data);
        $this->load->view("hotel/vw_hotel", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Cat Hotel";
        $data['list_jasa'] = $this->Jasa_model->selectDataJasa();
        $data['list_hewan'] = $this->Hewan_model->selectDataHewan();
        $this->load->view("layout/header", $data);
        $this->load->view("hotel/vw_tambah_hotel", $data);
        $this->load->view("layout/footer", $data);
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Cat Hotel";
        $data['hotel'] = $this->Hotel_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("hotel/vw_detail_hotel", $data);
        $this->load->view("layout/footer", $data);
    }
    public function hapus($id)
    {
        $this->Hotel_model->delete($id);
        redirect('Hotel');
    }
    function upload()
    {
        $data = [
            'id_hewan' => $this->input->post('inNamaHewan'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'waktu_masuk' => $this->input->post('waktu_masuk'),
            'tanggal_keluar' => $this->input->post('tanggal_keluar'),
            'waktu_keluar' => $this->input->post('waktu_keluar'),
            'id_jasa' => $this->input->post('inNamaJasa'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->Hotel_model->insert($data); // Now $data contains the image name if uploaded
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Cat Hotel Berhasil Ditambah!</div>');
        redirect('Hotel');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Cat Hotel";
        $data['hotel'] = $this->Hotel_model->getById($id);
        $data['list_jasa'] = $this->Jasa_model->selectDataJasa();
        $data['list_hewan'] = $this->Hewan_model->selectDataHewan();
        $this->load->view("layout/header");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');

        $this->load->view("hotel/vw_ubah_hotel", $data);
        $this->load->view("layout/footer");
    }
    public function update()
    {
        $id = $this->input->post('id'); // Ambil ID staf yang akan diubah

        // Ambil data staf sebelumnya dari basis data
        $old_staff_data = $this->Hotel_model->getById($id);

        // Buat array data baru untuk update
        $data = [
            'id_hewan' => $this->input->post('inNamaJasa'),
            'tanggal' => $this->input->post('tanggal'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'waktu_masuk' => $this->input->post('waktu_masuk'),
            'tanggal_keluar' => $this->input->post('tanggal_keluar'),
            'waktu_keluar' => $this->input->post('waktu_keluar'),
            'id_jasa' => $this->input->post('inNamaJasa'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        // Lakukan update data staf
        $this->Hotel_model->update(['id_hotel' => $id], $data);

        // Setelah update selesai, lakukan pengalihan (redirect) ke halaman yang sesuai
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Cat Hotel Berhasil Diubah!</div>');
        redirect('Hotel');
    }
}
