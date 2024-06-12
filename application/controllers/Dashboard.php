<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login
        if (!$this->session->userdata('auth')['isLoggedIn']) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = "Dashboard";
        $this->load->view("layout/header", $data);
        $this->load->view("dashboard", $data);
        $this->load->view("layout/footer", $data);
    }
}