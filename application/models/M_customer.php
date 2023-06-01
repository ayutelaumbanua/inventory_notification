<?php

class M_customer extends CI_Model
{
	protected $_table = 'customer';

	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	public function lihat_from_to($from, $to = '')
	{
		$query = $this->db->query(
			'select * from customer where tgl_daftar >= "' . $from . '" and tgl_daftar <= "' . $to . '"'
		);
		return $query->result();
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_cst()
	{
		$query = $this->db->select('nama');
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_id($id)
	{
		$query = $this->db->get_where($this->_table, ['id' => $id]);
		return $query->row();
	}

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function edit($data, $id)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['id' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id)
	{
		return $this->db->delete($this->_table, ['id' => $id]);
	}
}