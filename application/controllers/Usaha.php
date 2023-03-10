<?php

class Usaha extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_usaha', 'm_usaha');
		$this->data['aktif'] = 'usaha';
	}

	public function index()
	{
		$this->data['title'] = 'Profil Usaha';
		$this->data['usaha'] = $this->m_usaha->lihat();
		$this->load->view('usaha', $this->data);
	}

	public function proses_edit()
	{
		$data = [
			'nama_usaha' => $this->input->post('nama_usaha'),
			'nama_pemilik' => $this->input->post('nama_pemilik'),
			'no_telepon' => $this->input->post('no_telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if ($this->m_usaha->edit($data)) {
			$this->session->set_flashdata('success', 'Profil usaha <strong>berhasil</strong> diperbaharui');
			redirect('usaha');
		} else {
			$this->session->set_flashdata('error', 'Profil usaha <strong>gagal</strong> diperbaharui');
			redirect('usaha');
		}
	}
}