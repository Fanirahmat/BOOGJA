<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_kasir_model extends CI_Model {

	public function cek_login()
	{
		$login = $this->db->join('level', 'level.id_level = kasir.id_level')
						  ->join('restoran','restoran.id_restoran = kasir.id_restoran')
						  ->where('username', $this->input->post('username'))
						  ->where('password', $this->input->post('password'))
						  ->get('kasir');

		if ($this->db->affected_rows()>0) 
		{
			$cek = $login->row();
			$array = array('username' => $cek->username,
							'password' => $cek->password,
							'nama_level' => $cek->nama_level,
							'id_restoran' => $cek->id_restoran,
							'logged' => true);

			$this->session->set_userdata($array);
			return true;
		}
		else
		{
			return false;
		}
	}	

}

/* End of file Login_kasir_model.php */
/* Location: ./application/modules/kasir/models/Login_kasir_model.php */