<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_restoran_model extends CI_Model {

	public function get_restoran()
	{
		return $this->db->get('restoran')->result();
	}	
	public function cari_get_restoran($nama_restoran)
	{
		return $this->db->like('nama_restoran', $nama_restoran)->get('restoran')->result();
	}
	public function get_detail_res($id_restoran)
	{
		return $this->db->where('id_restoran', $id_restoran)
						->get('restoran')->row();
	}
	public function detail_meja($id_restoran)
	{
		return $this->db->join('restoran_meja', 'restoran_meja.id_restoran = restoran.id_restoran')
						->where('restoran.id_restoran', $id_restoran)
						->where('restoran_meja.status_meja', 1)
						->get('restoran')
						->result();
	}
	public function get_detail_mas($id_restoran)
	{
		return $this->db->where('id_restoran',$id_restoran)
						->get('masakan')
						->result();
	}
	public function get_p_meja()
	{
		$query = $this->db->where('username', $this->session->userdata('username'))->get('pesanan_meja')->result();
		return $query;
	}
	public function hapus_meja($id_pesanan)
	{
	    return $this->db->where('id_pesanan', $id_pesanan)->delete('pesanan_meja');
	}
	public function hapus_all_meja()
	{
		return $this->db->where('username', $this->session->userdata('username'))->delete('pesanan_meja');
	}
	
	
	

}

/* End of file Get_restoran_model.php */
/* Location: ./application/modules/pelanggan/models/Get_restoran_model.php */