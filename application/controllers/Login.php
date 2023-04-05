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
        ;
    }

    function autentikasi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $validasi_username = $this->M_login->query_validasi_username($username);
        if ($validasi_username->num_rows() > 0) {
            $validate_ps = $this->M_login->query_validasi_password($username, $password);
            if ($validate_ps->num_rows() > 0) {
                $x = $validate_ps->row_array();
                if ($x['status'] == 'Aktif') {
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('user', $username);
                    $id = $x['id'];
                    if ($x['level'] == 'Manager') {
                        $nama = $x['nama'];
                        $this->session->set_userdata('access', 'Manager');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('nama', $nama);
                        $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
                        redirect('dashboard');

                    } else if ($x['level'] == 'Purchasing') {
                        $nama = $x['nama'];
                        $this->session->set_userdata('access', 'Purchasing');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('nama', $nama);
                        $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
                        redirect('dashboard');

                    } else if ($x['level'] == 'Staff Gudang') {
                        $nama = $x['nama'];
                        $this->session->set_userdata('access', 'Staff Gudang');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('nama', $nama);
                        $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
                        redirect('dashboard');
                    }
                } else {
                    $url = base_url('login');
                    echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect($url);
                }
            } else {
                $url = base_url('login');
                echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }

        } else {
            $url = base_url('login');
            echo $this->session->set_flashdata('msg', '<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>Username yang kamu masukan salah.</p>');
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