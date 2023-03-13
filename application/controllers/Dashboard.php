<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'staff_gudang' && $this->session->login['role'] != 'purchasing' && $this->session->login['role'] != 'manager')
			redirect();
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_pengeluaran', 'm_pengeluaran');
		$this->load->model('M_penerimaan', 'm_penerimaan');
		$this->load->model('M_manager', 'm_manager');
		$this->load->model('M_purchasing', 'm_purchasing');
		$this->load->model('M_staff_gudang', 'm_staff_gudang');
		$this->load->model('M_usaha', 'm_usaha');
	}

	public function index()
	{
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['jumlah_barang'] = $this->m_barang->jumlah();
		$this->data['jumlah_stock_habis'] = $this->m_barang->jumlah_stock_habis();
		$this->data['jumlah_customer'] = $this->m_customer->jumlah();
		$this->data['jumlah_supplier'] = $this->m_supplier->jumlah();
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran->jumlah();
		$this->data['jumlah_penerimaan'] = $this->m_penerimaan->jumlah();
		$this->data['jumlah_manager'] = $this->m_manager->jumlah();
		$this->data['jumlah_purchasing'] = $this->m_purchasing->jumlah();
		$this->data['jumlah_staff_gudang'] = $this->m_staff_gudang->jumlah();
		$this->data['usaha'] = $this->m_usaha->lihat();
		$this->load->view('dashboard', $this->data);
	}

}