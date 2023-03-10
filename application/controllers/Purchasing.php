
<?php

use Dompdf\Dompdf;

class Purchasing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'staff_gudang' && $this->session->login['role'] != 'purchasing' && $this->session->login['role'] != 'manager')
			redirect();
		$this->data['aktif'] = 'purchasing';
		$this->load->model('M_purchasing', 'm_purchasing');
	}

	public function index()
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Managemen purchasing tidak dapat diakses!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Data Purchasing';
		$this->data['all_purchasing'] = $this->m_purchasing->lihat();
		$this->data['no'] = 1;

		$this->load->view('purchasing/lihat', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Purchasing';

		$this->load->view('purchasing/tambah', $this->data);
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

		if ($this->m_purchasing->tambah($data)) {
			$this->session->set_flashdata('success', 'Data purchasing <strong>Berhasil</strong> Ditambahkan!');
			redirect('purchasing');
		} else {
			$this->session->set_flashdata('error', 'Data purchasing <strong>Gagal</strong> Ditambahkan!');
			redirect('purchasing');
		}
	}

	public function edit($id)
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Edit Purchasing';
		$this->data['purchasing'] = $this->m_purchasing->lihat_id($id);

		$this->load->view('purchasing/edit', $this->data);
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

		if ($this->m_purchasing->edit($data, $id)) {
			$this->session->set_flashdata('success', 'Data purchasing <strong>berhasil</strong> diperbaharui');
			redirect('purchasing');
		} else {
			$this->session->set_flashdata('error', 'Data purchasing <strong>Gagal</strong> diperbaharui');
			redirect('purchasing');
		}
	}

	public function hapus($id)
	{
		if ($this->session->login['role'] == 'staff_gudang' && $this->session->login['role'] == 'purchasing') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		if ($this->m_purchasing->hapus($id)) {
			$this->session->set_flashdata('success', 'Data purchasing <strong>berhasil</strong> dihapus');
			redirect('purchasing');
		} else {
			$this->session->set_flashdata('error', 'Data purchasing <strong>gagal</strong> dihapus');
			redirect('purchasing');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_purchasing'] = $this->m_purchasing->lihat();
		$this->data['title'] = 'Laporan Data Purchasing';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('purchasing/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data purchasing Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}