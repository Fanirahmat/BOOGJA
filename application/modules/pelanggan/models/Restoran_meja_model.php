<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restoran_meja_model extends CI_Model {

	public function get_last_meja()
    {
        return $this->db->where('username', $this->session->userdata('username'))
                        ->limit('1')
                        ->order_by('id_pesanan')
                        ->limit('1')
                        ->get('pesanan_meja')
                        ->row();
    }
    public function update_restoran_meja($id_restoran,$no_meja)
    {
    	$data = array('status_meja' => 2 );
    	return $this->db->where('id_restoran', $id_restoran)
    					->where('no_meja', $no_meja)
    					->update('restoran_meja', $data);
    }

}

/* End of file Restoran_meja_model.php */
/* Location: ./application/modules/pelanggan/models/Restoran_meja_model.php */