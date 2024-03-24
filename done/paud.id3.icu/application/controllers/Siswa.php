<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $this->load->view('layout/header');
        $this->load->view('siswa/dataSiswa', $data);
        $this->load->view('layout/footer');
    }
    public function update($id)
    {
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak Ke', 'required');
        $this->form_validation->set_rules('jml_saudara', 'Jumlah Saudara', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('no_telp_ortu', 'No Telp', 'required');
        $this->form_validation->set_rules('alamat_ortu', 'Alamat Ortu', 'required');
        // $this->form_validation->set_rules('foto', 'Image', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('siswa');
        } else {
            $data = [
                'tahun_ajaran' => htmlspecialchars($this->input->post('tahun_ajaran')),
                'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa')),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
                'agama' => htmlspecialchars($this->input->post('agama')),
                'anak_ke' => htmlspecialchars($this->input->post('anak_ke')),
                'jml_saudara' => htmlspecialchars($this->input->post('jml_saudara')),
                'nama_ayah' => htmlspecialchars($this->input->post('nama_ayah')),
                'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu')),
                'no_telp_ortu' => htmlspecialchars($this->input->post('no_telp_ortu')),
                'alamat_ortu' => htmlspecialchars($this->input->post('alamat_ortu'))
            ];
            $this->db->where('id_siswa', $id);
            $this->db->update('siswa', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('siswa');
        }
    }
    public function hapus($id)
    {
        $this->db->where(['id_siswa  ' => $id]);
        $query = $this->db->delete('siswa');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('siswa');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('siswa');
        }
    }
    public function detail_siswa($id)
    {
        $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
        $this->load->view('siswa/detail_siswa', $data);
    }
}
