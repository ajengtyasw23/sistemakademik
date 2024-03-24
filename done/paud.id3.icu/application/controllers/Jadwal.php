<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
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
        if ($this->session->userdata('role') != 'guru') {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('pelajaran', 'Pelajaran', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'required');
        $this->form_validation->set_rules('guru', 'Guru', 'required');

        if ($this->form_validation->run() == false) {
            $data['mapel'] = $this->db->get('pelajaran')->result_array();
            $data['guru'] = $this->db->get('guru')->result_array();
            $data['jadwal'] = $this->M_paud->get_jadwal_all();
            $this->load->view('layout/header');
            $this->load->view('jadwal/jadwal', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'id_pelajaran' => htmlspecialchars($this->input->post('pelajaran')),
                'hari' => htmlspecialchars($this->input->post('hari')),
                'jam_mulai' => htmlspecialchars($this->input->post('waktu_mulai')),
                'jam_selesai' => htmlspecialchars($this->input->post('waktu_selesai')),
                'id_guru' => htmlspecialchars($this->input->post('guru')),
            ];
            $this->db->insert('jadwal_pelajaran', $data);
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            redirect('jadwal');
        }
    }
    public function tambah_mapel()
    {
        if ($this->session->userdata('role') != 'guru') {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('kode_pelajaran', 'Kode Pelajaran', 'required');
        $this->form_validation->set_rules('pelajaran', 'Pelajaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            redirect('jadwal');
        } else {
            $data = [
                'kode_pelajaran' => htmlspecialchars($this->input->post('kode_pelajaran')),
                'pelajaran' => htmlspecialchars($this->input->post('pelajaran')),
            ];
            $this->db->insert('pelajaran', $data);
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            redirect('jadwal');
        }
    }
    public function lihat()
    {
        $data['senin'] = $this->M_paud->get_jadwal('Senin');
        $data['selasa'] = $this->M_paud->get_jadwal('Selasa');
        $data['rabu'] = $this->M_paud->get_jadwal('Rabu');
        $data['kamis'] = $this->M_paud->get_jadwal('Kamis');
        $data['jumat'] = $this->M_paud->get_jadwal("Jumat");
        $this->load->view('jadwal/lihatJadwal', $data);
    }
    public function hapus($id)
    {
        $this->db->where(['id_jadwal_pelajaran' => $id]);
        $query = $this->db->delete('jadwal_pelajaran');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('jadwal');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('jadwal');
        }
    }
    public function ubah($id)
    {
        if ($this->session->userdata('role') != 'guru') {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('pelajaran', 'Pelajaran', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'required');
        $this->form_validation->set_rules('guru', 'Guru', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('jadwal');
        } else {
            $data = [
                'id_pelajaran' => htmlspecialchars($this->input->post('pelajaran')),
                'hari' => htmlspecialchars($this->input->post('hari')),
                'jam_mulai' => htmlspecialchars($this->input->post('waktu_mulai')),
                'jam_selesai' => htmlspecialchars($this->input->post('waktu_selesai')),
                'id_guru' => htmlspecialchars($this->input->post('guru')),
            ];
            $this->db->where('id_jadwal_pelajaran', $id);
            $this->db->update('jadwal_pelajaran', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('jadwal');
        }
    }
}
