<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('access') == 'Manager' && $this->session->userdata('access') == 'Purchasing' && $this->session->userdata('access') == 'Staff Gudang')
			redirect();
			
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_pengeluaran', 'm_pengeluaran');
		$this->load->model('M_penerimaan', 'm_penerimaan');
		$this->load->model('M_user', 'm_user');
		$this->load->model('M_usaha', 'm_usaha');
	}

	public function index()
	{
		$this->data['title'] = 'Dashboard';
		$this->data['jumlah_barang'] = $this->m_barang->jumlah();
		$this->data['jumlah_stock_habis'] = $this->m_barang->jumlah_stock_habis();
		$this->data['jumlah_customer'] = $this->m_customer->jumlah();
		$this->data['jumlah_supplier'] = $this->m_supplier->jumlah();
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran->jumlah();
		$this->data['jumlah_penerimaan'] = $this->m_penerimaan->jumlah();
		$this->data['jumlah_user'] = $this->m_user->jumlah();
		$this->data['usaha'] = $this->m_usaha->lihat();
		$this->load->view('dashboard', $this->data);
	}

}