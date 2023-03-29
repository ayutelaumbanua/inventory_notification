<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->login)
			redirect('dashboard');
		$this->load->model('M_manager', 'm_manager');
		$this->load->model('M_staff_gudang', 'm_staff_gudang');
		$this->load->model('M_purchasing', 'm_purchasing');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function proses_login()
	{
		if ($this->input->post('role') === 'staff_gudang')
			$this->_proses_login_staff_gudang($this->input->post('username'));
		elseif ($this->input->post('role') === 'purchasing')
			$this->_proses_login_purchasing($this->input->post('username'));
		elseif ($this->input->post('role') === 'manager')
			$this->_proses_login_manager($this->input->post('username'));
		else {
			?>
			<script>
				alert('role tidak tersedia!')
			</script>
			<?php
		}
	}

	protected function _proses_login_staff_gudang($username)
	{
		$get_staff_gudang = $this->m_staff_gudang->lihat_username($username);
		if ($get_staff_gudang) {
			if ($get_staff_gudang->password == $this->input->post('password')) {
				$session = [
					'kode' => $get_staff_gudang->kode,
					'nama' => $get_staff_gudang->nama,
					'username' => $get_staff_gudang->username,
					'password' => $get_staff_gudang->password,
					'role' => $this->input->post('role')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
	
	protected function _proses_login_purchasing($username)
	{
		$get_purchasing = $this->m_purchasing->lihat_username($username);
		if ($get_purchasing) {
			if ($get_purchasing->password == $this->input->post('password')) {
				$session = [
					'kode' => $get_purchasing->kode,
					'nama' => $get_purchasing->nama,
					'username' => $get_purchasing->username,
					'password' => $get_purchasing->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
	protected function _proses_login_manager($username)
	{
		$get_manager = $this->m_manager->lihat_username($username);
		if ($get_manager) {
			if ($get_manager->password == $this->input->post('password')) {
				$session = [
					'kode' => $get_manager->kode,
					'nama' => $get_manager->nama,
					'username' => $get_manager->username,
					'password' => $get_manager->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
}