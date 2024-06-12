<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Produk";
        $data['categories'] = $this->Produk_model->get_categories();
        $data['produk'] = $this->Produk_model->get_filtered_products();
        $this->load->view("layout/header", $data);
        $this->load->view("produk/vw_produk", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Produk";
        $data['random_string'] = bin2hex(random_bytes(4));
        $this->load->view("layout/header", $data);
        $this->load->view("produk/vw_tambah_produk", $data);
        $this->load->view("layout/footer", $data);
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Produk";
        $data['produk'] = $this->Produk_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("produk/vw_detail_produk", $data);
        $this->load->view("layout/footer", $data);
    }
    public function hapus($id)
    {
        $this->Produk_model->delete($id);
        redirect('produk');
    }
    function upload()
    {
        $data = [
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'gambar' => $this->input->post('gambar'),
            'stok' => $this->input->post('stok'),
            'satuan' => $this->input->post('satuan'),
            'kategori' => $this->input->post('kategori'),
            'modal' => $this->input->post('modal'),
            'harga' => $this->input->post('harga'),
        ];

        if (!empty($_FILES['gambar']['name'])) { // Check if file is uploaded
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/produk/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $data['gambar'] = $new_image; // Assign the new image name to $data array
            } else {
                echo $this->upload->display_errors();
            }
        }


        $this->Produk_model->insert($data); // Now $data contains the image name if uploaded
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Produk Berhasil Ditambah!</div>');
        redirect('Produk');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Produk";
        $data['produk'] = $this->Produk_model->getById($id);
        $data['random_string'] = bin2hex(random_bytes(4));
        $this->load->view("layout/header");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');

        $this->load->view("produk/vw_ubah_produk", $data);
        $this->load->view("layout/footer");
    }
    public function update()
    {
        $id = $this->input->post('id'); // Ambil ID staf yang akan diubah

        // Ambil data staf sebelumnya dari basis data
        $old_produk_data = $this->Produk_model->getById($id);

        // Buat array data baru untuk update
        $data = [
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'stok' => $this->input->post('stok'),
            'satuan' => $this->input->post('satuan'),
            'kategori' => $this->input->post('kategori'),
            'modal' => $this->input->post('modal'),
            'harga' => $this->input->post('harga'),
        ];

        // Pengecekan apakah file gambar diunggah
        if (!empty($_FILES['gambar']['name'])) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/produk/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                // Hapus gambar lama jika bukan default.jpg
                $old_image = $old_produk_data['gambar'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/produk/' . $old_image);
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

        // Lakukan update data staf
        $this->Produk_model->update(['id_produk' => $id], $data);


        // Setelah update selesai, lakukan pengalihan (redirect) ke halaman yang sesuai
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data produk Berhasil Diubah!</div>');
        redirect('Produk');
    }

    public function filter_and_sort()
    {
        $kategori = $this->input->get('kategori');
        $data['produk'] = $this->Produk_model->get_filtered_products($kategori);
        $data['categories'] = $this->Produk_model->get_categories();
        $this->load->view("layout/header", $data);
        $this->load->view('Produk/vw_produk', $data);
        $this->load->view("layout/footer", $data);
    }

    public function uploadExcel()
    {
        // Load library upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect('produk');
        } else {
            $file = $this->upload->data('full_path');
            $reader = new Xlsx();
            $spreadsheet = $reader->load($file);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            foreach ($sheetData as $key => $value) {
                if ($key == 0) {
                    continue; // Skip header row
                }

                $kode_produk = $value[0];
                $stok_tambah = $value[1];

                // Update stok produk
                $this->Produk_model->updateStok($kode_produk, $stok_tambah);
            }

            // Delete the uploaded file after processing
            unlink($file);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok produk berhasil diunggah!</div>');
            redirect('produk');
        }
    }

}
