<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == false) {
            redirect('home/login');
        }
        if ($this->session->userdata('role') != 'siswa') {
            redirect('dashboard');
        }
    }
    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->db->get_where('siswa', ['id_siswa' => $user_id])->row_array();
        $tahun_ajaran = $user['tahun_ajaran'];
        $data['rapor'] = $this->M_paud->get_nilai_siswa_where2($tahun_ajaran, $user_id);
        $this->load->view('rapor/index', $data);
    }
    public function printRapor($id)
    {
        $data['nilai'] = $this->M_paud->get_nilai_siswa_where($id);
        $id_siswa = $data['nilai']['id_siswa'];
        $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
        $data['detail_nilai'] = $this->db->get_where('detail_nilai', ['id_nilai' => $id])->result_array();
        $this->load->view('rapor/rapor', $data);
    }
    public function lihatRapor($id)
    {
        $data['nilai'] = $this->M_paud->get_nilai_siswa_where($id);
        $id_siswa = $data['nilai']['id_siswa'];
        $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
        $data['detail_nilai'] = $this->db->get_where('detail_nilai', ['id_nilai' => $id])->result_array();
        $this->load->view('rapor/lihatrapor', $data);
    }
}
