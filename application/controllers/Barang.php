<?php

use Dompdf\Dompdf;

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('access') != 'Manager' && $this->session->userdata('access') != 'Purchasing' && $this->session->userdata('access') != 'Staff Gudang')
			redirect();

		$this->data['aktif'] = 'barang';
		$this->data['aktif'] = 'satuan';
		$this->data['aktif'] = 'usaha';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_satuan', 'm_satuan');
		$this->load->model('M_kategori', 'm_kategori');
	}

	public function index()
	{
		$this->data['title'] = 'Data Barang';
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['all_kategori'] = $this->m_kategori->lihat();
		$this->data['all_satuan'] = $this->m_satuan->lihat();
		$this->data['no'] = 1;

		$this->load->view('barang/lihat', $this->data);
	}

	// Data Barang
	public function proses_tambah_barang()
	{
		if ($this->session->userdata('access') == 'Staff Gudang') {
			$this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
			redirect('barang');
		}
		$data = [
			'kode_barang' => $this->input->post('kode_barang'),
			'kategori_barang' => $this->input->post('kategori_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
			'tgl_daftar' => $this->input->post('tgl_daftar'),
		];

		if ($this->m_barang->tambah_barang($data)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('barang');
		}
	}

	public function proses_edit($kode_barang)
	{
		if ($this->session->userdata('access') == 'Staff Gudang') {
			$this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
			redirect('barang');
		}
		$data = [
			'kode_barang' => $this->input->post('kode_barang'),
			'kategori_barang' => $this->input->post('kategori_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
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
		if ($this->session->userdata('access') == 'Staff Gudang' or $this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Hapus <strong>Barang</strong> tidak dilakukan!');
			redirect('barang');
		}

		if ($this->m_barang->hapus($kode_barang)) {
			$this->session->set_flashdata('success', 'Data barang <strong>berhasil</strong> dihapus');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Data barang <strong>gagal</strong> dihapus');
			redirect('barang');
		}
	}

	// Data Kategori
	public function kategori()
	{
		$this->data['title'] = 'Data Kategori';
		$this->data['all_kategori'] = $this->m_kategori->lihat();
		$this->data['no'] = 1;

		$this->load->view('barang/kategori', $this->data);
	}
	// Data Kategori
	public function satuan()
	{
		$this->data['title'] = 'Data Satuan';
		$this->data['all_satuan'] = $this->m_satuan->lihat();
		$this->data['no'] = 1;

		$this->load->view('barang/satuan', $this->data);
	}
	// Data Stock Habis
	public function stock_habis()
	{
		$this->data['title'] = 'Data Barang Habis';
		$this->data['all_stock_habis'] = $this->m_barang->lihat_stock_habis();
		$this->data['no'] = 1;

		$this->load->view('barang/stock_habis', $this->data);
	}
	// Data Stock Expired
	public function stock_expired()
	{
		$this->data['title'] = 'Data Barang Expired';
		$this->data['all_stock_expired'] = $this->m_barang->lihat_stock_expired();
		$this->data['no'] = 1;

		$this->load->view('barang/stock_expired', $this->data);
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
		$html = $this->load->view('barang/report_barang_habis', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function export_barang_expired()
	{
		$dompdf = new Dompdf();
		$this->data['all_stock_expired'] = $this->m_barang->lihat_stock_expired();
		$this->data['title'] = 'Laporan Data Barang Expired';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('barang/report_barang_expired', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
	
}