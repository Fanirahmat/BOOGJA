<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek_login()
	{
		$login = $this->db->join('level','level.id_level=pengurus.id_level')
							->where('username', $this->input->post('username'))
							->where('password', $this->input->post('password'))
							->get('pengurus');

		if ($this->db->affected_rows()>0) 
		{
			$cek = $login->row();
			$array = array(
						'username' => $cek->username,
						'password' => $cek->password,
						'nama_level' => $cek->nama_level,
						'logged' => true
			);
			
			$this->session->set_userdata( $array );
			return true;
		}
		else
		{
			return false;
		}
	}

}

/* End of file Login_model.php */
/* Location: ./application/modules/admin/models/Login_model.php */