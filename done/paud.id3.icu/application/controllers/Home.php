<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('layout/header_home');
        $this->load->view('home/home');
        $this->load->view('layout/footer_home');
    }
    public function daftar()
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
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[siswa.username]', ['is_unique' => 'This username has already registered!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        // $this->form_validation->set_rules('foto', 'Image', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header_home');
            $this->load->view('home/daftar');
            $this->load->view('layout/footer_home');
        } else {

            $config['upload_path'] = './upload/siswa/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // ukuran maksimum file dalam kilobita (KB)
            $config['encrypt_name'] = TRUE; // mengacak nama file

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $this->db->set('foto', $file_name);
            }
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
                'alamat_ortu' => htmlspecialchars($this->input->post('alamat_ortu')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
            ];
            $this->db->insert('siswa', $data);
            $this->session->set_flashdata('pesan', 'Pendaftaran Berhasil');
            redirect('home/login');
        }
    }
    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header_home');
            $this->load->view('home/login');
            $this->load->view('layout/footer_home');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $user = $this->db->get_where('guru', ['username' => $username])->row_array();
        $user2 = $this->db->get_where('siswa', ['username' => $username])->row_array();
        $user3 = $this->db->get_where('kepsek', ['username' => $username])->row_array();

        if ($user && password_verify($password, $user['password'])) {
            $data = [
                'user_id' => $user['id_guru'],
                'role' => 'guru'
            ];
            $this->session->set_userdata($data);
            redirect('dashboard/');
        } elseif ($user3 && password_verify($password, $user3['password'])) {
            $data = [
                'user_id' => $user3['id_kepsek'],
                'role' => 'kepsek'
            ];
            $this->session->set_userdata($data);
            redirect('dashboard/');
        } elseif ($user2 && password_verify($password, $user2['password'])) {
            $data = [
                'user_id' => $user2['id_siswa'],
                'role' => 'siswa'
            ];
            $this->session->set_userdata($data);
            redirect('dashboard/');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong username or password!</div>');
            redirect('home/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out! 
      </div>');
        redirect('home/login');
    }
}
