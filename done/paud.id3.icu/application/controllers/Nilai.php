<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
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
        $data['nilai'] = $this->M_paud->get_nilai_siswa();
        $this->load->view('layout/header');
        $this->load->view('nilai/kelolaNilai', $data);
        $this->load->view('layout/footer');
    }
    public function tambah_nilai()
    {

        // Load library form_validation
        $this->load->library('form_validation');

        // Set aturan validasi untuk setiap field pada form
        $this->form_validation->set_rules('guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun/Ajaran', 'required');
        $this->form_validation->set_rules('tb', 'Tinggi Badan', 'required');
        $this->form_validation->set_rules('bb', 'Berat Badan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['guru'] = $this->db->get('guru')->result_array();
            $data['siswa'] = $this->db->get('siswa')->result_array();
            $this->load->view('layout/header');
            $this->load->view('nilai/tambahNilai', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'id_guru' => htmlspecialchars($this->input->post('guru')),
                'id_siswa' => htmlspecialchars($this->input->post('siswa')),
                'semester' => htmlspecialchars($this->input->post('semester')),
                'tahun_ajaran' => htmlspecialchars($this->input->post('tahun_ajaran')),
                't_badan' => htmlspecialchars($this->input->post('tb')),
                'b_badan' => htmlspecialchars($this->input->post('bb')),
                'catatan_siswa' => $this->input->post('catatan'),

            );
            $data2 = [
                'capaian' => $this->input->post('capaian'),
            ];
			// var_dump($data2);
            // Panggil fungsi insert_nilai pada model Nilai_model
            $this->M_paud->insert_nilai($data, $data2);
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            redirect('nilai');
        }
    }
    public function ubah_nilai()
    {
        $this->load->view('layout/header');
        $this->load->view('nilai/ubahNilai');
        $this->load->view('layout/footer');
    }

    public function detail_nilai($id)
    {

        $data['nilai'] = $this->M_paud->get_nilai_siswa_where($id);
        $data['detail_nilai'] = $this->db->get_where('detail_nilai', ['id_nilai' => $id])->result_array();
        $this->load->view('nilai/detail_nilai', $data);
    }
    public function hapus($id)
    {
        $this->db->where(['id_nilai' => $id]);
        $query = $this->db->delete('detail_nilai');

        if ($query) {
            $this->db->where(['id_nilai' => $id]);
            $query2 = $this->db->delete('nilai');
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('nilai');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('nilai');
        }
    }
}
