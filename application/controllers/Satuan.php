<?php

use Dompdf\Dompdf;

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('access') != 'Manager' && $this->session->userdata('access') != 'Purchasing' && $this->session->userdata('access') != 'Staff Gudang')
            redirect();
        $this->data['aktif'] = 'satuan';
        $this->load->model('M_satuan', 'm_satuan');
    }

    public function index()
    {
        $this->data['title'] = 'Data Satuan';
        $this->data['all_satuan'] = $this->m_satuan->lihat();
        $this->data['no'] = 1;
        $this->load->view('satuan/lihat', $this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->userdata('access') == 'Staff Gudang') {
            $this->session->set_flashdata('error', 'Tambah data tidak dapat dilakukan!');
            redirect('dashboard');
        }
        $data = [
            'satuan' => $this->input->post('satuan'),
            'tgl_daftar' => $this->input->post('tgl_daftar'),
        ];

        if ($this->m_satuan->tambah_satuan($data)) {
            $this->session->set_flashdata('success', 'Data Satuan <strong>Berhasil</strong> Ditambahkan!');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('error', 'Data Satuan <strong>Gagal</strong> Ditambahkan!');
            redirect('satuan');
        }
    }


    public function proses_edit($id)
    {
        if ($this->session->userdata('access') == 'Staff Gudang') {
            $this->session->set_flashdata('error', 'Edit data tidak dapat dilakukan!');
            redirect('satuan');
        }
        $data = [
            'satuan' => $this->input->post('satuan'),
        ];
        if ($this->m_satuan->edit($data, $id)) {
            $this->session->set_flashdata('success', 'Data satuan <strong>berhasil</strong> diperbaharui');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('error', 'Data satuan <strong>gagal</strong> diperbaharui');
            redirect('satuan');
        }
    }
    public function hapus($id)
    {
        if ($this->session->userdata('access') == 'Staff Gudang' or $this->session->userdata('access') == 'Purchasing') {
            $this->session->set_flashdata('error', 'Hapus <strong>Satuan</strong> tidak dilakukan!');
            redirect('satuan');
        }
        if ($this->m_satuan->hapus($id)) {
            $this->session->set_flashdata('success', 'Data satuan <strong>Berhasil</strong> dihapus');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('error', 'Data satuan <strong>Gagal</strong> dihapus');
            redirect('satuan');
        }
    }
    public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_satuan'] = $this->m_satuan->lihat();
		$this->data['title'] = 'Laporan Data Satuan';
		$this->data['no'] = 1;
        
		$dompdf->setPaper('A4', 'Potrait');
		$html = $this->load->view('satuan/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Satuan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}