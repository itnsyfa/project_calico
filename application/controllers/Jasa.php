<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jasa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
        $this->load->model('Jasa_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Jasa";
        $data['jasa'] = $this->Jasa_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("jasa/vw_jasa", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Jasa";
        $this->load->view("layout/header", $data);
        $this->load->view("jasa/vw_tambah_jasa", $data);
        $this->load->view("layout/footer", $data);
    }

    public function getById($id)
    {
        $data = $this->Jasa_model->getById($id);
        echo json_encode($data);
    }
    // public function detail($id)
    // {
    //     $data['judul'] = "Halaman Detail Jasa";
    //     $data['hewan'] = $this->Hewan_model->getById($id);
    //     $this->load->view("layout/header", $data);
    //     $this->load->view("hewan/vw_detail_hewan", $data);
    //     $this->load->view("layout/footer", $data);
    // }
    public function hapus($id)
    {
        $this->Jasa_model->delete($id);
        redirect('Jasa');
    }
    function upload()
    {
        $data = [
            'nama_jasa' => $this->input->post('nama_jasa'),
            'harga' => $this->input->post('harga'),
        ];

        $this->Jasa_model->insert($data); // Now $data contains the image name if uploaded
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Jasa Berhasil Ditambah!</div>');
        redirect('Jasa');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Jasa";
        $data['jasa'] = $this->Jasa_model->getById($id);
        $this->load->view("layout/header");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');

        $this->load->view("jasa/vw_ubah_jasa", $data);
        $this->load->view("layout/footer");
    }

    public function update()
    {
        $id = $this->input->post('id_jasa');
        $data = [
            'nama_jasa' => $this->input->post('nama_jasa'),
            'harga' => $this->input->post('harga'),
        ];

        $this->Jasa_model->update(['id_jasa' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jasa Berhasil Diubah!</div>');
        redirect('Jasa');
    }
}
