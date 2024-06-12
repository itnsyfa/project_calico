<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Laporan";
        $data['laporan'] = $this->Laporan_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("laporan/vw_laporan", $data);
        $this->load->view("layout/footer", $data);
    }
    // public function tambah()
    // {
    //     $data['judul'] = "Halaman Tambah Laporan";
    //     $this->load->view("layout/header", $data);
    //     $this->load->view("laporan/vw_tambah_laporan", $data);
    //     $this->load->view("layout/footer", $data);
    // }

    public function getById($id)
    {
        $data = $this->Laporan_model->getById($id);
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
        $this->Laporan_model->delete($id);
        redirect('Laporan');
    }
    function upload()
    {
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'jenis' => $this->input->post('jenis'),
            'kategori' => $this->input->post('kategori'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        if (!empty($_FILES['gambar']['name'])) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf'; // Tambahkan 'pdf' ke allowed_types
            $config['max_size'] = '2048'; // 2 MB
            $config['upload_path'] = './assets/img/laporan/'; // Sesuaikan path jika diperlukan

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $uploaded_file = $this->upload->data('file_name');
                $data['gambar'] = $uploaded_file; // Assign the uploaded file name to $data array
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }


        $this->Laporan_model->insert($data); // Now $data contains the image name if uploaded
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Laporan Berhasil Ditambah!</div>');
        redirect('Laporan');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Laporan";
        $data['laporan'] = $this->Laporan_model->getById($id);
        $this->load->view("layout/header");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gambar', 'File', 'required');

        $this->load->view("laporan/vw_ubah_laporan", $data);
        $this->load->view("layout/footer");
    }

    public function update()
    {
        $id = $this->input->post('id'); // Ambil ID staf yang akan diubah

        // Ambil data staf sebelumnya dari basis data
        $old_laporan_data = $this->Laporan_model->getById($id);

        // Buat array data baru untuk update
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'jenis' => $this->input->post('jenis'),
            'kategori' => $this->input->post('kategori'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        // Pengecekan apakah file gambar diunggah
        if (!empty($_FILES['gambar']['name'])) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/laporan/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                // Hapus gambar lama jika ada dan bukan default.jpg
                $old_image = $this->input->post('old_gambar');
                if ($old_image && $old_image != 'default.jpg') {
                    @unlink(FCPATH . 'assets/img/laporan/' . $old_image);
                }

                // Simpan nama gambar baru ke dalam $data
                $new_image = $this->upload->data('file_name');
                $data['gambar'] = $new_image;
            } else {
                // Tampilkan pesan error jika upload gambar gagal
                echo $this->upload->display_errors();
                return;
            }
        }

        // Lakukan update data laporan
        $this->Laporan_model->update(['id_laporan' => $id], $data);

        // Setelah update selesai, lakukan pengalihan (redirect) ke halaman yang sesuai
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Laporan Berhasil Diubah!</div>');
        redirect('Laporan');
    }
}
