<?php

use Dompdf\Dompdf;

class Penerimaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'penerimaan';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_penerimaan', 'm_penerimaan');
		$this->load->model('M_detail_penerimaan', 'm_detail_penerimaan');
	}

	public function index()
	{
		$this->data['title'] = 'Transaksi Penerimaan';
		$this->data['all_penerimaan'] = $this->m_penerimaan->lihat();
		$this->data['no'] = 1;
		$this->load->view('penerimaan/lihat', $this->data);
	}

	public function tambah()
	{
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['all_supplier'] = $this->m_supplier->lihat_spl();
		$this->load->view('penerimaan/tambah', $this->data);
	}

	public function proses_tambah()
	{
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));

		$data_terima = [
			'no_terima' => $this->input->post('no_terima'),
			'tgl_terima' => $this->input->post('tgl_terima'),
			'nama_supplier' => $this->input->post('nama_supplier'),
			'nama_petugas' => $this->input->post('nama_petugas'),
		];

		$data_detail_penerimaan = [];
		for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
			array_push($data_detail_penerimaan, ['no_terima' => $this->input->post('no_terima')]);
			$data_detail_penerimaan[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_penerimaan[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_penerimaan[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_penerimaan[$i]['tgl_expired'] = $this->input->post('tgl_expired_hidden')[$i];
		}

		if ($this->m_penerimaan->tambah($data_terima) && $this->m_detail_penerimaan->tambah($data_detail_penerimaan)) {
			for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
				$this->m_barang->plus_stok($data_detail_penerimaan[$i]['jumlah'], $data_detail_penerimaan[$i]['nama_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('penerimaan');
		}
	}

	public function detail($no_terima)
	{
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_penerimaan->lihat_no_terima($no_terima);
		$this->data['all_detail_penerimaan'] = $this->m_detail_penerimaan->lihat_no_terima($no_terima);
		$this->data['no'] = 1;

		$this->load->view('penerimaan/detail', $this->data);
	}

	public function hapus($no_terima)
	{
		if ($this->m_penerimaan->hapus($no_terima) && $this->m_detail_penerimaan->hapus($no_terima)) {
			$this->session->set_flashdata('success', 'Invoice penerimaan <strong>berhasil</strong> dihapus');
			redirect('penerimaan');
		} else {
			$this->session->set_flashdata('error', 'Invoice penerimaan <strong>gagal</strong> dihapus!');
			redirect('penerimaan');
		}
	}

	public function get_all_barang()
	{
		$data = $this->m_barang->lihat_nama_barang($_POST['nama_barang']);
		echo json_encode($data);
	}

	public function keranjang_barang()
	{
		$this->load->view('penerimaan/keranjang');
	}

	public function export()
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_penerimaan'] = $this->m_penerimaan->lihat();
		$this->data['title'] = 'Laporan Data Penerimaan';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Potrait');
		$html = $this->load->view('penerimaan/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Penerimaan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function export_detail($no_terima)
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['penerimaan'] = $this->m_penerimaan->lihat_no_terima($no_terima);
		$this->data['all_detail_penerimaan'] = $this->m_detail_penerimaan->lihat_no_terima($no_terima);
		$this->data['title'] = 'Laporan Detail Penerimaan';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Potrait');
		$html = $this->load->view('penerimaan/detail_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Detail Penerimaan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}