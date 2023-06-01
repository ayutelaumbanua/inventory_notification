<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login', 'M_login');
    }

    function index()
    {
        if ($this->session->userdata('logged') != TRUE) {
            $this->load->view('login');
        } else {
            $url = base_url('dashboard');
            redirect($url);
        }
    }

    function autentikasi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $validasi_username = $this->M_login->query_validasi_username($username);
        if ($validasi_username->num_rows() > 0) {
            $user = $validasi_username->row();
            if (password_verify($password, $user->password)) {
                if ($user->status == 'Aktif') {
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('user', $username);
                    $id = $user->id;
                    $nama = $user->nama;

                    if ($user->level == 'Manager') {
                        $this->session->set_userdata('access', 'Manager');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('nama', $nama);
                        $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
                        redirect('dashboard');
                    } else if ($user->level == 'Purchasing') {
                        $this->session->set_userdata('access', 'Purchasing');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('nama', $nama);
                        $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
                        redirect('dashboard');
                    } else if ($user->level == 'Staff Gudang') {
                        $this->session->set_userdata('access', 'Staff Gudang');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('nama', $nama);
                        $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
                        redirect('dashboard');
                    }
                } else {
                    $url = base_url('login');
                    $this->session->set_flashdata('error', '<strong>Username</strong> atau <strong>Password</strong> salah!');
                    redirect($url);
                }
            } else {
                $url = base_url('login');
                $this->session->set_flashdata('error', '<strong>Username</strong> atau <strong>Password</strong> salah!');
                redirect($url);
            }
        } else {
            $url = base_url('login');
            $this->session->set_flashdata('error', '<strong>Username</strong> atau <strong>Password</strong> salah!');
            redirect($url);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('login');
        redirect($url);
    }
}
