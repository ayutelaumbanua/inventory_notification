<?php

class M_user extends CI_Model
{
	protected $_table = 'user';

	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id)
	{
		$query = $this->db->get_where($this->_table, ['id' => $id]);
		return $query->row();
	}

	public function lihat_username($username)
	{
		$query = $this->db->get_where($this->_table, ['username' => $username]);
		return $query->row();
	}

	// public function tambah($data)
	// {
	// 	return $this->db->insert($this->_table, $data);
	// }

	public function tambah($nama, $email, $telepon, $level, $status, $username, $password)
	{
		$data = array(
			'nama' => $nama,
			'email' => strtolower($email),
			'telepon' => $telepon,
			'level' => $level,
			'status' => $status,
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT)
		);

		$this->db->insert('user', $data);
		return 1;
	}

	public function edit($nama, $email, $telepon, $level, $status, $username, $id)
	{
		$data = array(
			'nama' => $nama,
			'email' => strtolower($email),
			'telepon' => $telepon,
			'level' => $level,
			'status' => $status,
			'username' => $username,
			// 'password' => password_hash($password, PASSWORD_DEFAULT)
		);
		$query = $this->db->set($data);
		$query = $this->db->where(['id' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}
	public function resetPassword($username, $password, $id)
	{
		$data = array(
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT)
		);
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