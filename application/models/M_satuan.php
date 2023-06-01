<?php

class M_satuan extends CI_Model
{
    protected $_table = 'satuan';

    public function lihat()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    public function lihat_from_to($from, $to = '')
	{
		$query = $this->db->query(
			'select * from satuan where tgl_daftar >= "' . $from . '" and tgl_daftar <= "' . $to . '"'
		);
		return $query->result();
	}
    public function tambah_satuan($data)
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