<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus_model extends CI_Model {

	public function get_pengurus()
	{
		return $this->db->join('level', 'level.id_level= kasir.id_level')
						->join('restoran', 'restoran.id_restoran=kasir.id_restoran')
						->get('kasir')->result();
	}
	public function get_level()
	{
		return $this->db->get('level')->result();
	}
	public function detail($id_pengurus)
	{
		return $this->db->where('id_pengurus', $id_pengurus)->get('pengurus')->row();
	}
	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */