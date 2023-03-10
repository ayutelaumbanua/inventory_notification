<?php

class M_detail_barang_masuk extends CI_Model
{
	protected $_table = 'detail_barang_masuk';

	public function tambah($data)
	{
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_terima($no_terima)
	{
		return $this->db->get_where($this->_table, ['no_terima' => $no_terima])->result();
	}

	public function hapus($no_terima)
	{
		return $this->db->delete($this->_table, ['no_terima' => $no_terima]);
	}
}