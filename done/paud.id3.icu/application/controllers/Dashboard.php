<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == false) {
            redirect('home/login');
        }
    }
    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role == 'siswa') {
            $this->load->view('layout/header');
            $this->load->view('dashboard/index2');
            // $this->load->view('layout/footer');
        } else {
            $data['siswa'] = $this->db->count_all('siswa');
            $data['guru'] = $this->db->count_all('guru');
            $this->load->view('layout/header');
            $this->load->view('dashboard/index', $data);
            $this->load->view('layout/footer');
        }
    }
}
