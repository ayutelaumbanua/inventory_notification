<?php

use Dompdf\Dompdf;

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'staff_gudang' && $this->session->login['role'] != 'purchasing' && $this->session->login['role'] != 'manager')
			redirect();
		$this->data['aktif'] = 'barang';
		$this->load->model('M_barang', 'm_barang');
	}

	public function index()
	{
		$this->data['title'] = 'Data Barang';
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['no'] = 1;

		$this->load->view('barang/lihat', $this->data);
	}
	public function stock_habis()
	{
		$this->data['title'] = 'Data Barang Habis';
		$this->data['all_stock_habis'] = $this->m_barang->lihat_stock_habis();
		$this->data['no'] = 1;

		$this->load->view('barang/stock_habis', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Tambah Barang';
		$this->load->view('barang/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('dashboard');
		}
		$data = [
			'kode_barang' => $this->input->post('kode_barang'),
			'kategori_barang' => $this->input->post('kategori_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'tgl_daftar' => $this->input->post('tgl_daftar'),
		];

		if ($this->m_barang->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('barang');
		}
	}

	public function edit($kode_barang)
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Edit Barang';
		$this->data['barang'] = $this->m_barang->lihat_id($kode_barang);

		$this->load->view('barang/edit', $this->data);
	}

	public function proses_edit($kode_barang)
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('dashboard');
		}

		$data = [
			'kode_barang' => $this->input->post('kode_barang'),
			'kategori_barang' => $this->input->post('kategori_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'tgl_edit' => $this->input->post('tgl_edit'),

		];

		if ($this->m_barang->edit($data, $kode_barang)) {
			$this->session->set_flashdata('success', 'Data barang <strong>berhasil</strong> diperbaharui');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Data barang <strong>gagal</strong> diperbaharui');
			redirect('barang');
		}
	}

	public function hapus($kode_barang)
	{
		if ($this->session->login['role'] == 'staff_gudang') {
			$this->session->set_flashdata('error', 'Hapus data tidak dilakukan');
			redirect('dashboard');
		}

		if ($this->m_barang->hapus($kode_barang)) {
			$this->session->set_flashdata('success', 'Data barang <strong>Berhasil</strong> dihapus');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Data barang <strong>Gagal</strong> dihapus');
			redirect('barang');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['title'] = 'Laporan Data Barang';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('barang/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
	public function export_barang_habis()
	{
		$dompdf = new Dompdf();
		$this->data['all_barang'] = $this->m_barang->lihat_stock_habis();
		$this->data['title'] = 'Laporan Data Barang Habis';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('barang/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
	public function get_low_stock()
	{
		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode($this->db->get_where('barang', 'stok <= 5', 3)->result()));
	}
	public function get_notification()
	{
		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode($this->db->get_where('barang', 'stok <= 5')->result()));
	}

}