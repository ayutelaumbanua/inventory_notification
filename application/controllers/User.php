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
		if ($this->session->userdata('access') == 'Staff Gudang' && $this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Management User tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Data User';
		$this->data['all_user'] = $this->m_user->lihat();
		$this->data['no'] = 1;

		$this->load->view('user/lihat', $this->data);
	}

	public function tambah()
	{
		if ($this->session->userdata('access') == 'Staff Gudang' && $this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah User';

		$this->load->view('user/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if ($this->session->userdata('access') == 'Staff Gudang' && $this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'level' => $this->input->post('level'),
			'status' => $this->input->post('status'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if ($this->m_user->tambah($data)) {
			$this->session->set_flashdata('success', 'Data User <strong>Berhasil</strong> Ditambahkan!');
			redirect('user');
		} else {
			$this->session->set_flashdata('error', 'Data User <strong>Gagal</strong> Ditambahkan!');
			redirect('user');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('access') == 'Staff Gudang' && $this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Tidak dapat diakses!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Edit User';
		$this->data['user'] = $this->m_user->lihat_id($id);

		$this->load->view('user/edit', $this->data);
	}

	public function proses_edit($id)
	{
		if ($this->session->userdata('access') == 'Staff Gudang' && $this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'level' => $this->input->post('level'),
			'status' => $this->input->post('status'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if ($this->m_user->edit($data, $id)) {
			$this->session->set_flashdata('success', 'Data User <strong>berhasil</strong> diperbaharui');
			redirect('user');
		} else {
			$this->session->set_flashdata('error', 'Data User<strong>Gagal</strong> diperbaharui');
			redirect('user');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('access') == 'Staff Gudang' && $this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Tidak dapat diakses!');
			redirect('dashboard');
		}

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