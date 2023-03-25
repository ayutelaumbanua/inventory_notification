<?php

class M_barang extends CI_Model
{
	protected $_table = 'barang';
	protected $_table_satuan = 'satuan';
	protected $_table_expired = 'detail_barang_masuk';

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

	// Data satuan
	public function lihat_satuan()
	{
		$query = $this->db->get($this->_table_satuan);
		return $query->result();
	}
	public function lihat_id_satuan($kode_satuan)
	{
		$query = $this->db->get_where($this->_table_satuan, ['kode_satuan' => $kode_satuan]);
		return $query->row();
	}
	public function tambah_satuan($data)
	{
		return $this->db->insert($this->_table_satuan, $data);
	}

	public function edit_satuan($data, $kode_satuan)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_satuan' => $kode_satuan]);
		$query = $this->db->update($this->_table_satuan);
		return $query;
	}

	// Data Stock Habis
	public function lihat_stock_habis()
	{
		$query = $this->db->get_where($this->_table, 'stok < 5');
		return $query->result();
	}
	public function jumlah_stock_habis()
	{
		$query = $this->db->get_where($this->_table, 'stok < 5');
		return $query->num_rows();
	}
	public function stock_habis($data)
	{
		return $this->db->insert($this->_table, $data);
	}


	// Data Stock Expired
	public function lihat_stock_expired()
	{
		$tgl_now = date("j F Y");
		$tgl_exp = "tgl_expired";
		$query = $this->db->get_where($this->_table_expired, $tgl_now > $tgl_exp );
		return $query->result();
	}

}