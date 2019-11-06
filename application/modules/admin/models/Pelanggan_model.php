<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function get_pelanggan()
	{
		return $this->db->get('pelanggan')->result();
	}
	public function hapus($id_pelanggan)
	{
		return $this->db->where('id_pelanggan', $id_pelanggan)->delete('pelanggan');
	}

}

/* End of file Pelanggan_model.php */
/* Location: ./application/modules/admin/models/Pelanggan_model.php */