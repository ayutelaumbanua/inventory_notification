<?php

use Dompdf\Dompdf;

class Pengeluaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'pengeluaran';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_pengeluaran', 'm_pengeluaran');
		$this->load->model('M_detail_pengeluaran', 'm_detail_pengeluaran');
	}

	public function index()
	{
		$this->data['title'] = 'Transaksi Pengeluaran';
		$this->data['all_pengeluaran'] = $this->m_pengeluaran->lihat();
		$this->data['no'] = 1;
		$in = $this->session->flashdata('arrlist');
		if (isset($in)) {
			$this->data['arrlist'] = $in;
		}
		$this->load->view('pengeluaran/lihat', $this->data);
	}

	public function tambah()
	{
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['all_barang'] = $this->m_barang->lihat_stok();
		$this->data['all_customer'] = $this->m_customer->lihat_cst();

		$this->load->view('pengeluaran/tambah', $this->data);
	}

	public function proses_tambah()
	{
		$jumlah_barang_keluar = count($this->input->post('nama_barang_hidden'));

		$data_barang_keluar = [
			'no_keluar' => $this->input->post('no_keluar'),
			'tgl_keluar' => $this->input->post('tgl_keluar'),
			'nama_customer' => $this->input->post('nama_customer'),
			'nama_petugas' => $this->input->post('nama_petugas'),
		];

		$data_detail_pengeluaran = [];

		for ($i = 0; $i < $jumlah_barang_keluar; $i++) {
			array_push($data_detail_pengeluaran, ['no_keluar' => $this->input->post('no_keluar')]);
			$data_detail_pengeluaran[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_pengeluaran[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_pengeluaran[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
		}
		
		if ($this->m_pengeluaran->tambah($data_barang_keluar) && $this->m_detail_pengeluaran->tambah($data_detail_pengeluaran)) {
			$arrlist = [];
			for ($i = 0; $i < $jumlah_barang_keluar; $i++) {
				$this->m_barang->min_stok($data_detail_pengeluaran[$i]['jumlah'], $data_detail_pengeluaran[$i]['nama_barang']) or die('gagal min stok');
				$list_lowbarang = $this->m_barang->lihat_stock_habis();
				foreach ($list_lowbarang as $key) {
					if ($key->nama_barang == $data_detail_pengeluaran[$i]['nama_barang']) {
						array_push($arrlist,$key->id);
					}
				}
			}
			if (count($arrlist)) {
				$this->session->set_flashdata('arrlist',$arrlist);
			}
				$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
				redirect('pengeluaran');
		}
	}

	public function detail($no_keluar)
	{
		$this->data['title'] = 'Detail Pengeluaran';
		$this->data['pengeluaran'] = $this->m_pengeluaran->lihat_no_keluar($no_keluar);
		$this->data['all_detail_pengeluaran'] = $this->m_detail_pengeluaran->lihat_no_keluar($no_keluar);
		$this->data['no'] = 1;

		$this->load->view('pengeluaran/detail', $this->data);
	}

	public function hapus($no_keluar)
	{
		if ($this->session->userdata('access') == 'Staff Gudang' or $this->session->userdata('access') == 'Purchasing') {
			$this->session->set_flashdata('error', 'Hapus <strong>Transaksi Pengeluaran</strong> tidak dilakukan!');
			redirect('pengeluaran');
		}

		if ($this->m_pengeluaran->hapus($no_keluar) && $this->m_detail_pengeluaran->hapus($no_keluar)) {
			$this->session->set_flashdata('success', 'Invoice pengeluaran <strong>berhasil</strong> dihapus');
			redirect('pengeluaran');
		} else {
			$this->session->set_flashdata('error', 'Invoice pengeluaran <strong>gagal</strong> dihapus');
			redirect('pengeluaran');
		}
	}

	public function get_all_barang()
	{
		$data = $this->m_barang->lihat_nama_barang($_POST['nama_barang']);
		echo json_encode($data);
	}

	public function keranjang_barang()
	{
		$this->load->view('pengeluaran/keranjang');
	}

	public function export()
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_pengeluaran'] = $this->m_pengeluaran->lihat();
		$this->data['title'] = 'Laporan Data Pengeluaran';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Potrait');
		$html = $this->load->view('pengeluaran/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Pengeluaran Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function export_detail($no_keluar)
	{
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['pengeluaran'] = $this->m_pengeluaran->lihat_no_keluar($no_keluar);
		$this->data['all_detail_pengeluaran'] = $this->m_detail_pengeluaran->lihat_no_keluar($no_keluar);
		$this->data['title'] = 'Laporan Detail Pengeluaran';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Potrait');
		$html = $this->load->view('pengeluaran/detail_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Detail Pengeluaran Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}