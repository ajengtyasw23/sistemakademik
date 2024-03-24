<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == false) {
            redirect('home/login');
        }
        if ($this->session->userdata('role') != 'guru') {
            redirect('dashboard');
        }
    }
    public function index()
    {
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('siswa', 'Siswa', 'required');
        $this->form_validation->set_rules('kehadiran', 'Kehadrian', 'required');

        if ($this->form_validation->run() == false) {

            $data['siswa'] = $this->db->get('siswa')->result_array();
            $data['absensi'] = $this->db->get('absensi')->result_array();
            $this->load->view('layout/header');
            $this->load->view('absensi/index', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'tahun_ajaran' => htmlspecialchars($this->input->post('tahun_ajaran')),
                'kelas' => htmlspecialchars($this->input->post('kelas')),
                'hari_absen' => htmlspecialchars($this->input->post('hari')),
                'tanggal_absen' => htmlspecialchars($this->input->post('tanggal')),
                'nama_siswa' => htmlspecialchars($this->input->post('siswa')),
                'kehadiran' => htmlspecialchars($this->input->post('kehadiran')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
            ];
            $this->db->insert('absensi', $data);
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            redirect('absensi');
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        // $this->form_validation->set_rules('siswa', 'siswa', 'required');
        $this->form_validation->set_rules('kehadiran', 'Kehadiran', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('absensi');
        } else {
            $data = [
                'tahun_ajaran' => htmlspecialchars($this->input->post('tahun_ajaran')),
                'kelas' => htmlspecialchars($this->input->post('kelas')),
                'hari_absen' => htmlspecialchars($this->input->post('hari')),
                'tanggal_absen' => htmlspecialchars($this->input->post('tanggal')),
                // 'nama_siswa' => htmlspecialchars($this->input->post('siswa')),
                'kehadiran' => htmlspecialchars($this->input->post('kehadiran')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
            ];
            $this->db->where('id_absensi', $id);
            $this->db->update('absensi', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('absensi');
        }
    }
    public function hapus($id)
    {
        $this->db->where(['id_absensi  ' => $id]);
        $query = $this->db->delete('absensi');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('absensi');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('absensi');
        }
    }
}
