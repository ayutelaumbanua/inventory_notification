<?php

use Dompdf\Dompdf;

class Staff_Gudang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'staff_gudang' &&$this->session->login['role'] != 'purchasing' && $this->session->login['role'] != 'manager')
			redirect();
		$this->data['aktif'] = 'staff_gudang';
		$this->load->model('M_staff_gudang', 'm_staff_gudang');
	}

	public function index()
	{
		$this->data['title'] = 'Data Staff Gudang';
		$this->data['all_staff_gudang'] = $this->m_staff_gudang->lihat();
		$this->data['no'] = 1;

		$this->load->view('staff_gudang/lihat', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Staff Gudang';

		$this->load->view('staff_gudang/tambah', $this->data);
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

		if ($this->m_staff_gudang->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Staff Gudang <strong>Berhasil</strong> Ditambahkan!');
			redirect('staff_gudang');
		} else {
			$this->session->set_flashdata('error', 'Data Staff Gudang <strong>Gagal</strong> Ditambahkan!');
			redirect('staff_gudang');
		}
	}

	public function edit($id)
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Edit Staff Gudang';
		$this->data['staff_gudang'] = $this->m_staff_gudang->lihat_id($id);

		$this->load->view('staff_gudang/edit', $this->data);
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

		if ($this->m_staff_gudang->edit($data, $id)) {
			$this->session->set_flashdata('success', 'Data staff gudang <strong>berhasil</strong> diperbaharui');
			redirect('staff_gudang');
		} else {
			$this->session->set_flashdata('error', 'Data staff gudang <strong>gagal</strong> diperbaharui');
			redirect('staff_gudang');
		}
	}

	public function hapus($id)
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Hapus data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		if ($this->m_staff_gudang->hapus($id)) {
			$this->session->set_flashdata('success', 'Data staff gudang <strong>berhasil</strong> dihapus');
			redirect('staff_gudang');
		} else {
			$this->session->set_flashdata('error', 'Data staff gudang <strong>gagal</strong> dihapus');
			redirect('staff_gudang');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_staff_gudang'] = $this->m_staff_gudang->lihat();
		$this->data['title'] = 'Laporan Data Staff Gudang';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('staff_gudang/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Staff GudangTanggal ' . date('d F Y'), array("Attachment" => false));
	}
}