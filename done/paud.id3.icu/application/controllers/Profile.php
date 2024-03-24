<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $user_id = $this->session->userdata('user_id');
        if ($role == 'siswa') {
            $data['user'] = $this->db->get_where('siswa', ['id_siswa' => $user_id])->row_array();
            $this->load->view('layout/header');
            $this->load->view('profile/index', $data);
            $this->load->view('layout/footer');
        } elseif ($role == 'guru') {
            $data['user'] = $this->db->get_where('guru', ['id_guru' => $user_id])->row_array();
            $this->load->view('layout/header');
            $this->load->view('profile/index', $data);
            $this->load->view('layout/footer');
        } elseif ($role == 'kepsek') {
            $data['user'] = $this->db->get_where('kepsek', ['id_kepsek' => $user_id])->row_array();
            $this->load->view('layout/header');
            $this->load->view('profile/index', $data);
            $this->load->view('layout/footer');
        }
    }
    public function update_guru()
    {
        $id = $this->session->userdata('user_id');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('alamat', 'alamat1', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $user = $this->db->get_where('guru', ['id_guru' => $id])->row_array();
        $new_username = htmlspecialchars($this->input->post('username'));
        if ($new_username == $user['username']) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[guru.username]', ['is_unique' => 'This username has already registered!']);
        }
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update!!');
            redirect('profile');
        } else {
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('name')),
                'username' => htmlspecialchars($this->input->post('username')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'no_telp' => htmlspecialchars($this->input->post('no_telp')),
            ];
            $where = [
                'id_guru' => $id
            ];
            $this->db->where($where);
            $query =  $this->db->update('guru', $data);
            if (!$query) {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('profile');
            } else {
                $this->session->set_flashdata('flash', 'Di Updatee');
                redirect('profile');
            }
        }
    }
    public function update_kepsek()
    {
        $id = $this->session->userdata('user_id');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('alamat', 'alamat1', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $user = $this->db->get_where('kepsek', ['id_kepsek' => $id])->row_array();
        $new_username = htmlspecialchars($this->input->post('username'));
        if ($new_username == $user['username']) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[kepsek.username]', ['is_unique' => 'This username has already registered!']);
        }
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update!!');
            redirect('profile');
        } else {
            $data = [
                'nama_kepsek' => htmlspecialchars($this->input->post('name')),
                'username' => htmlspecialchars($this->input->post('username')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'no_telp' => htmlspecialchars($this->input->post('no_telp')),
            ];
            $where = [
                'id_kepsek' => $id
            ];
            $this->db->where($where);
            $query =  $this->db->update('kepsek', $data);
            if (!$query) {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('profile');
            } else {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('profile');
            }
        }
    }
    public function changepassword()
    {
        $role = $this->session->userdata('role');
        $id = $this->session->userdata('user_id');
        if ($role == 'siswa') {
            $data['user'] = $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
        } elseif ($role == 'guru') {
            $data['user'] = $this->db->get_where('guru', ['id_guru' => $id])->row_array();
        } elseif ('kepala sekolah') {
            $data['user'] = $this->db->get_where('kepsek', ['id_kepsek' => $id])->row_array();
        }
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Updatee');
            redirect('profile');
        } else {
            $current_password = htmlspecialchars($this->input->post('current_password'));;
            $new_password = htmlspecialchars($this->input->post('new_password1'));
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', ' Wrong current password!');
                redirect('profile');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan', '  New Password cannot be the same as current password!');
                    redirect('profile');
                } else {
                    // Password suda oke
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    if ($role == 'siswa') {
                        $this->db->where('id_siswa', $id);
                        $this->db->update('siswa');
                    } elseif ($role == 'guru') {
                        $this->db->where('id_guru', $id);
                        $this->db->update('guru');
                    } elseif ('kepala sekolah') {
                        $this->db->where('id_kepsek', $id);
                        $this->db->update('kepsek');
                    }
                    $this->session->set_flashdata('flash', 'Di Update');
                    redirect('profile');
                }
            }
        }
    }
    public function update_foto()
    {
        $user = $this->session->userdata('user_id');
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path'] = './upload/siswa/';
            $config['allowed_types'] = 'gif|png|jpeg|jpg';
            $config['max_size']     = '2000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';

            $this->load->library('upload', $config);
            $old_image = $this->input->post('old_image');
            if ($this->upload->do_upload('image')) {
                if ($old_image != 'users.jpg') {
                    unlink(FCPATH . './upload/siswa/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('profile');
            }
        }
        $this->db->where('id_siswa', $user);
        $this->db->update('siswa');
        $this->session->set_flashdata('flash', 'Di Update');
        redirect('profile');
    }

    public function update_siswa()
    {
        $id = $this->session->userdata('user_id');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $user = $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
        $new_username = htmlspecialchars($this->input->post('username'));
        if ($new_username == $user['username']) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[siswa.username]', ['is_unique' => 'This username has already registered!']);
        }
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update!!');
            redirect('profile');
        } else {
            $data = [
                'nama_siswa' => htmlspecialchars($this->input->post('name')),
                'username' => htmlspecialchars($this->input->post('username'))
            ];
            $where = [
                'id_siswa' => $id
            ];
            $this->db->where($where);
            $query =  $this->db->update('siswa', $data);
            if (!$query) {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('profile');
            } else {
                $this->session->set_flashdata('flash', 'Di Updatee');
                redirect('profile');
            }
        }
    }
}
