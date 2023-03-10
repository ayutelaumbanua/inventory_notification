<?php

use Dompdf\Dompdf;

class Manager extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'staff_gudang' && $this->session->login['role'] != 'purchasing' && $this->session->login['role'] != 'manager')
			redirect();
		$this->data['aktif'] = 'manager';
		$this->load->model('M_manager', 'm_manager');
	}

	public function index()
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Managemen Manager tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Data Manager';
		$this->data['all_manager'] = $this->m_manager->lihat();
		$this->data['no'] = 1;

		$this->load->view('manager/lihat', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Manager';

		$this->load->view('manager/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if ($this->m_manager->tambah($data)) {
			$this->session->set_flashdata('success', 'Data manager <strong>Berhasil</strong> Ditambahkan!');
			redirect('manager');
		} else {
			$this->session->set_flashdata('error', 'Data manager <strong>Gagal</strong> Ditambahkan!');
			redirect('manager');
		}
	}

	public function edit($id)
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Tidak dapat diakses!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Edit Manager';
		$this->data['manager'] = $this->m_manager->lihat_id($id);

		$this->load->view('manager/edit', $this->data);
	}

	public function proses_edit($id)
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if ($this->m_manager->edit($data, $id)) {
			$this->session->set_flashdata('success', 'Data Manager <strong>berhasil</strong> diperbaharui');
			redirect('manager');
		} else {
			$this->session->set_flashdata('error', 'Data Manager <strong>Gagal</strong> diperbaharui');
			redirect('manager');
		}
	}

	public function hapus($id)
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Tidak dapat diakses!');
			redirect('dashboard');
		}

		if ($this->m_manager->hapus($id)) {
			$this->session->set_flashdata('success', 'Data Manager <strong>berhasil</strong> dihapus');
			redirect('manager');
		} else {
			$this->session->set_flashdata('error', 'Data Manager <strong>gagal</strong> dihapus');
			redirect('manager');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_manager'] = $this->m_manager->lihat();
		$this->data['title'] = 'Laporan Data Manager';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('manager/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Manager Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}