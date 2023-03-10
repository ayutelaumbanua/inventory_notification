<?php

use Dompdf\Dompdf;

class Supplier extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'staff_gudang' && $this->session->login['role'] != 'purchasing' && $this->session->login['role'] != 'manager')
			redirect();
		$this->load->model('M_supplier', 'm_supplier');
		$this->data['aktif'] = 'supplier';
	}

	public function index()
	{
		$this->data['title'] = 'Data Supplier';
		$this->data['all_supplier'] = $this->m_supplier->lihat();
		$this->data['no'] = 1;

		$this->load->view('supplier/lihat', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Supplier';

		$this->load->view('supplier/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
			'tgl_daftar' => $this->input->post('tgl_daftar'),
		];

		if ($this->m_supplier->tambah($data)) {
			$this->session->set_flashdata('success', 'Data supplier <strong>berhasil</strong> ditambahkan');
			redirect('supplier');
		} else {
			$this->session->set_flashdata('error', 'Data supplier <strong>gagal</strong> ditambahkan');
			redirect('supplier');
		}
	}

	public function edit($kode)
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Edit Supplier';
		$this->data['supplier'] = $this->m_supplier->lihat_id($kode);

		$this->load->view('supplier/edit', $this->data);
	}

	public function proses_edit($kode)
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if ($this->m_supplier->edit($data, $kode)) {
			$this->session->set_flashdata('success', 'Data supplier <strong>berhasil</strong> diperbaharui');
			redirect('supplier');
		} else {
			$this->session->set_flashdata('error', 'Data supplier <strong>gagal</strong> diperbaharui');
			redirect('supplier');
		}
	}

	public function hapus($kode)
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Hapus data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		if ($this->m_supplier->hapus($kode)) {
			$this->session->set_flashdata('success', 'Data supplier <strong>berhasil</strong> dihapus');
			redirect('supplier');
		} else {
			$this->session->set_flashdata('error', 'Data supplier <strong>gagal</strong> dihapus');
			redirect('supplier');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_supplier'] = $this->m_supplier->lihat();
		$this->data['title'] = 'Laporan Data Supplier';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('supplier/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Supplier Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}