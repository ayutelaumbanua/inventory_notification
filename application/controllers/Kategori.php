<?php

use Dompdf\Dompdf;

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('access') != 'Manager' && $this->session->userdata('access') != 'Purchasing' && $this->session->userdata('access') != 'Staff Gudang')
            redirect();
        $this->data['aktif'] = 'kategori';
        $this->load->model('M_kategori', 'm_kategori');
    }

    public function index()
    {
        $this->data['title'] = 'Data Kategori';
        $this->data['all_kategori'] = $this->m_kategori->lihat();
        $this->data['no'] = 1;
        $this->load->view('kategori', $this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->userdata('access') == 'Staff Gudang') {
            $this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
            redirect('dashboard');
        }
        $data = [
            'kategori' => $this->input->post('kategori'),
            'tgl_daftar' => $this->input->post('tgl_daftar'),
        ];

        if ($this->m_kategori->tambah_kategori($data)) {
            $this->session->set_flashdata('success', 'Data Kategori <strong>Berhasil</strong> Ditambahkan!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Data Kategori <strong>Gagal</strong> Ditambahkan!');
            redirect('kategori');
        }
    }


    public function proses_edit($id)
    {
        if ($this->session->userdata('access') == 'Staff Gudang') {
            $this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
            redirect('kategori');
        }
        $data = [
            'kategori' => $this->input->post('kategori'),
        ];
        if ($this->m_kategori->edit($data, $id)) {
            $this->session->set_flashdata('success', 'Data Kategori <strong>berhasil</strong> diperbaharui');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Data Kategori <strong>gagal</strong> diperbaharui');
            redirect('kategori');
        }
    }


    public function hapus($id)
    {
        if ($this->session->userdata('access') == 'Staff Gudang' or $this->session->userdata('access') == 'Purchasing') {
            $this->session->set_flashdata('error', 'Hapus <strong>Kategori</strong> tidak dilakukan!');
            redirect('kategori');
        }
        if ($this->m_kategori->hapus($id)) {
            $this->session->set_flashdata('success', 'Data Kategori <strong>Berhasil</strong> dihapus');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Data Kategori <strong>Gagal</strong> dihapus');
            redirect('kategori');
        }
    }
}