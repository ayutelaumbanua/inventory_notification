<?php

class M_barang extends CI_Model
{
	protected $_table = 'barang';


	// Data Barang
	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	public function lihat_id($kode_barang)
	{
		$query = $this->db->get_where($this->_table, ['kode_barang' => $kode_barang]);
		return $query->row();
	}
	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	public function lihat_stok()
	{
		$query = $this->db->get_where($this->_table, 'stok > 1');
		return $query->result();
	}
	public function lihat_nama_barang($nama_barang)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_barang' => $nama_barang]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambah_barang($data)
	{
		return $this->db->insert($this->_table, $data);
	}
	public function plus_stok($stok, $nama_barang)
	{
		$query = $this->db->set('stok', 'stok+' . $stok, false);
		$query = $this->db->where('nama_barang', $nama_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}
	public function min_stok($stok, $nama_barang)
	{
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('nama_barang', $nama_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}
	public function edit($data, $kode_barang)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_barang' => $kode_barang]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_barang)
	{
		return $this->db->delete($this->_table, ['kode_barang' => $kode_barang]);
	}

	// Data Stock Habis
	public function lihat_stock_habis()
	{
		$query = $this->db->get_where($this->_table, 'stok < 5');
		return $query->result();
	}

	public function stock_habis($data)
	{
		return $this->db->insert($this->_table, $data);
	}
	public function jumlah_stock_habis()
	{
		$query = $this->db->get_where($this->_table, 'stok < 5');
		return $query->num_rows();
	}

	// Data Stock Expired
	public function lihat_stock_expired()
	{
		$this->db->select('*');
		$this->db->from('detail_penerimaan');
		$this->db->where('tgl_expired <=', date('Y-m-d', strtotime('+14 days')));
		$query = $this->db->get();
		return $query->result();
	}
	public function jumlah_stock_expired()
	{
		$this->db->select('*');
		$this->db->from('detail_penerimaan');
		$this->db->where('tgl_expired <=', date('Y-m-d', strtotime('+14 days')));
		$query = $this->db->get();
		return $query->num_rows();
	}

}