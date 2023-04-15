<?php

class M_dashboard extends CI_Model
{
    // Data Stock Expired
    public function lihat_stock_expired()
    {
        $this->db->select('*');
        $this->db->from('detail_penerimaan');
        $this->db->where('tgl_expired <=', date('Y-m-d', strtotime('+14 days')));
        $query = $this->db->get();
        return $query->result();
    }

}