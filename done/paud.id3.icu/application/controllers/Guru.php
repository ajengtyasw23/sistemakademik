<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
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
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[guru.username]', ['is_unique' => 'This username has already registered!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run() == false) {
            $data['guru'] = $this->db->get('guru')->result_array();
            $this->load->view('layout/header');
            $this->load->view('guru/dataGuru', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru')),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
                'jabatan' => htmlspecialchars($this->input->post('jabatan')),
                'no_telp' => htmlspecialchars($this->input->post('no_telp')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
            ];
            $query = $this->db->insert('guru', $data);
            if ($query) {

                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('guru');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('guru');
            }
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('guru');
        } else {
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru')),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
                'jabatan' => htmlspecialchars($this->input->post('jabatan')),
                'no_telp' => htmlspecialchars($this->input->post('no_telp')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan'))
            ];
            $this->db->where('id_guru', $id);
            $this->db->update('guru', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('guru');
        }
    }
    public function hapus($id)
    {
        $this->db->where(['id_guru' => $id]);
        $query = $this->db->delete('guru');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('guru');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('guru');
        }
    }
}
