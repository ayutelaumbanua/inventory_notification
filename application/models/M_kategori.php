<?php

class M_kategori extends CI_Model
{
    protected $_table = 'kategori';

    public function lihat()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    public function tambah_kategori($data)
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