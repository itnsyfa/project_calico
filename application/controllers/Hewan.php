<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hewan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
        $this->load->model('Hewan_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Hewan";
        $data['hewan'] = $this->Hewan_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("hewan/vw_hewan", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Hewan";
        $this->load->view("layout/header", $data);
        $this->load->view("hewan/vw_tambah_hewan", $data);
        $this->load->view("layout/footer", $data);
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Hewan";
        $data['hewan'] = $this->Hewan_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("hewan/vw_detail_hewan", $data);
        $this->load->view("layout/footer", $data);
    }
    public function hapus($id)
    {
        $this->Hewan_model->delete($id);
        redirect('Hewan');
    }
    function upload()
    {
        $data = [
            'nama_hewan' => $this->input->post('nama_hewan'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'spesies' => $this->input->post('spesies'),
            'ras' => $this->input->post('ras'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
        ];

        $this->Hewan_model->insert($data); // Now $data contains the image name if uploaded
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Hewan Berhasil Ditambah!</div>');
        redirect('Hewan');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Hewan";
        $data['hewan'] = $this->Hewan_model->getById($id);
        $this->load->view("layout/header");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');

        $this->load->view("hewan/vw_ubah_hewan", $data);
        $this->load->view("layout/footer");
    }
    public function update()
{
    $id = $this->input->post('id'); // Ambil ID staf yang akan diubah

    // Ambil data staf sebelumnya dari basis data
    $old_staff_data = $this->Hewan_model->getById($id);

    // Buat array data baru untuk update
    $data = [
        'nama_hewan' => $this->input->post('nama_hewan'),
        'nama_pemilik' => $this->input->post('nama_pemilik'),
        'spesies' => $this->input->post('spesies'),
        'ras' => $this->input->post('ras'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
    ];

    // Lakukan update data staf
    $this->Hewan_model->update(['id_hewan' => $id], $data);

    // Setelah update selesai, lakukan pengalihan (redirect) ke halaman yang sesuai
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Hewan Berhasil Diubah!</div>');
    redirect('Hewan');
}

}