<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session'); // Pastikan session library diload
    }

    public function index()
    {
        $this->load->view("auth/login");
    }

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Menyiapkan data pengguna untuk disimpan di session
                $data = [
                    'username' => $user['username'],
                    'gambar' => $user['gambar'], // Ambil data gambar dari tabel users
                    'id' => $user['id'],
                    'nama_users' => $user['nama_users'],
                    'isLoggedIn' => true // Menandakan bahwa user sudah login
                ];

                // Menyimpan seluruh data pengguna ke dalam session 'auth'
                $this->session->set_userdata('auth', $data);

                // Redirect ke halaman dashboard setelah login berhasil
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Username tidak ditemukan!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('auth'); // Hapus data auth dari session
        $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Logout!</div>');
        redirect('auth');
    }
}
