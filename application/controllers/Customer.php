<?php

use Dompdf\Dompdf;

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('access') != 'Manager' && $this->session->userdata('access') != 'Purchasing' && $this->session->userdata('access') != 'Staff Gudang')
			redirect();

		$this->load->model('M_customer', 'm_customer');
		$this->data['aktif'] = 'customer';
	}

	public function index()
	{
		$this->data['title'] = 'Data Customer';
		$this->data['all_customer'] = $this->m_customer->lihat();
		$this->data['no'] = 1;

		$this->load->view('customer/lihat', $this->data);
	}

	public function tambah()
	{
		if ($this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Customer';

		$this->load->view('customer/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if ($this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
			'tgl_daftar' => $this->input->post('tgl_daftar'),
		];

		if ($this->m_customer->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Customer <strong>Berhasil</strong> Ditambahkan!');
			redirect('customer');
		} else {
			$this->session->set_flashdata('error', 'Data Customer <strong>Gagal</strong> Ditambahkan!');
			redirect('customer');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Edit Customer';
		$this->data['customer'] = $this->m_customer->lihat_id($id);
		$this->load->view('customer/edit', $this->data);
	}

	public function proses_edit($id)
	{
		if ($this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),

		];

		if ($this->m_customer->edit($data, $id)) {
			$this->session->set_flashdata('success', 'Data customer <strong>berhasil</strong> diperbaharui');
			redirect('customer');
		} else {
			$this->session->set_flashdata('error', 'Data customer <strong>gagal</strong> diperbaharui');
			redirect('customer');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('access') == 'Staff Gudang' or $this->session->userdata('access') == 'Purchasing' ) {
			$this->session->set_flashdata('error', 'Hapus <strong>Customer</strong> tidak dilakukan!');
			redirect('customer');
		}

		if ($this->m_customer->hapus($id)) {
			$this->session->set_flashdata('success', 'Data customer <strong>berhasil</strong> dihapus');
			redirect('customer');
		} else {
			$this->session->set_flashdata('error', 'Data customer <strong>gagal</strong> dihapus');
			redirect('customer');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_customer'] = $this->m_customer->lihat();
		$this->data['title'] = 'Laporan Data Customer';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('customer/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Customer Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}