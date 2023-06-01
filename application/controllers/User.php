<?php

use Dompdf\Dompdf;

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('access') != 'Manager' && $this->session->userdata('access') != 'Purchasing' && $this->session->userdata('access') != 'Staff Gudang')
			redirect();
		$this->data['aktif'] = 'user';
		$this->load->model('M_user', 'm_user');
	}

	public function index()
	{
		$this->data['title'] = 'Data User';
		$this->data['all_user'] = $this->m_user->lihat();
		$this->data['no'] = 1;

		$this->load->view('user/lihat', $this->data);
	}

	public function tambah()
	{
		$this->data['title'] = 'Tambah User';
		$this->load->view('user/tambah', $this->data);
	}

	public function proses_tambah()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->m_user->tambah($nama, $email, $telepon, $level, $status, $username, $password)) {
			$this->session->set_flashdata('success', 'Data User <strong>Berhasil</strong> Ditambahkan!');
		} else {
			$this->session->set_flashdata('error', 'Data User <strong>Gagal</strong> Ditambahkan!');
		}

		redirect('user');
	}

	public function edit($id)
	{
		$this->data['title'] = 'Edit User';
		$this->data['user'] = $this->m_user->lihat_id($id);
		$this->load->view('user/edit', $this->data);
	}

	public function proses_edit($id)
	{

		if (
			$this->m_user->edit(
				$this->input->post('nama'),
				$this->input->post('email'),
				$this->input->post('telepon'),
				$this->input->post('level'),
				$this->input->post('status'),
				$this->input->post('username'),
				$id
			)
		) {
			$this->session->set_flashdata('success', 'Data User <strong>berhasil</strong> diperbaharui');
			redirect('user');
		} else {
			$this->session->set_flashdata('error', 'Data User<strong>Gagal</strong> diperbaharui');
			redirect('user');
		}
	}

	public function proses_reset_password($id)
	{
		if (
			$this->m_user->resetPassword(
				$this->input->post('username'),
				$this->input->post('password'),
				$id
			)
		) {
			$this->session->set_flashdata('success', 'Reset Password <strong>berhasil</strong> diperbaharui');
			redirect('user');
		} else {
			$this->session->set_flashdata('error', 'Reset Password<strong>Gagal</strong> diperbaharui');
			redirect('user');
		}
	}

	public function hapus($id)
	{

		if ($this->m_user->hapus($id)) {
			$this->session->set_flashdata('success', 'Data User <strong>berhasil</strong> dihapus');
			redirect('user');
		} else {
			$this->session->set_flashdata('error', 'Data User <strong>gagal</strong> dihapus');
			redirect('user');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_user'] = $this->m_user->lihat();
		$this->data['title'] = 'Laporan Data User';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('user/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data User Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}