<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Users";
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->Users_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("users/vw_users", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Users";
        $this->load->view("layout/header", $data);
        $this->load->view("users/vw_tambah_users", $data);
        $this->load->view("layout/footer", $data);
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Users";
        $data['users'] = $this->Users_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("users/vw_detail_users", $data);
        $this->load->view("layout/footer", $data);
    }
    public function hapus($id)
    {
        $this->Users_model->delete($id);
        redirect('Users');
    }
    function upload()
    {
        $data = [
            'nama_users' => $this->input->post('nama_users'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];

        if (!empty($_FILES['gambar']['name'])) { // Check if file is uploaded
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/users/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $data['gambar'] = $new_image; // Assign the new image name to $data array
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->Users_model->insert($data); // Now $data contains the image name if uploaded
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Staf Berhasil Ditambah!</div>');
        redirect('Users');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Users";
        $data['users'] = $this->Users_model->getById($id);
        $this->load->view("layout/header");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');

        $this->load->view("users/vw_ubah_users", $data);
        $this->load->view("layout/footer");
    }
    public function update()
{
    $id = $this->input->post('id'); // Ambil ID staf yang akan diubah

    // Ambil data staf sebelumnya dari basis data
    $old_users_data = $this->Users_model->getById($id);

    // Buat array data baru untuk update
    $data = [
        'nama_users' => $this->input->post('nama_users'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    ];

    // Pengecekan apakah file gambar diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/users/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            // Hapus gambar lama jika bukan default.jpg
            $old_image = $old_users_data['gambar'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/img/users/' . $old_image);
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
    $this->Users_model->update(['id' => $id], $data);

    // Setelah update selesai, lakukan pengalihan (redirect) ke halaman yang sesuai
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Staf Berhasil Diubah!</div>');
    redirect('Users');
}

}
