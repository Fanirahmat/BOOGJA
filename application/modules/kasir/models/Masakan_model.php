<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan_model extends CI_Model {

	public function get_masakan()
	{
		if ($this->session->userdata('nama_level')=="admin") 
		{
			return $this->db->join('restoran', 'masakan.id_restoran = restoran.id_restoran')->get('masakan')->result();	
		} 
		else 
		{
			return $this->db->join('restoran', 'masakan.id_restoran = restoran.id_restoran')
							->where('restoran.id_restoran' , $this->session->userdata('id_restoran'))
							->get('masakan')
							->result();
		}
	}
	public function get_resto()
	{
		return $this->db->get('restoran')->result();
	}	
	public function tambah()
	{
		$config['upload_path'] = './assets/gambar_masakan';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '1000900000';
		$config['max_width']  = '1024000000';
		$config['max_height']  = '7680000000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar_masakan')){
			$this->session->set_flashdata('pesan',$this->upload->display_errors());
		}
		else
		{
			$data = array('nama_masakan' => $this->input->post('nama_masakan'),
					'harga' => $this->input->post('harga'),
					'status_masakan' => $this->input->post('status_masakan'),
					'id_restoran' => $this->input->post('id_restoran'),
					'gambar_masakan' => $this->upload->data('file_name')
					
				);

			return $this->db->insert('masakan', $data);
		}
		
	}
	public function detail($id_masakan)
	{
		return $this->db->where('id_masakan', $id_masakan)
						->join('restoran', 'masakan.id_restoran = restoran.id_restoran')
						->get('masakan')
						->row();
	}
	public function update()
	{
		$nama_gambar = $_FILES['gambar_masakan']['name'];
		if ($nama_gambar!=null) 
		{
			$config['upload_path'] = './assets/gambar_masakan';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '1000000000';
			$config['max_width']  = '10240000000';
			$config['max_height']  = '768000000000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar_masakan')){
				$this->session->set_flashdata('pesan',$this->upload->display_errors());
			}
			else
			{
				$data = array('nama_masakan' => $this->input->post('nama_masakan'),
					'harga' => $this->input->post('harga'),
					'status_masakan' => $this->input->post('status_masakan'),
					'id_restoran' => $this->input->post('id_restoran'),
					'gambar_masakan' => $this->upload->data('file_name')
					
				);
				return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('masakan',$data);
			}
		}
		else
		{
			$data = array('nama_masakan' => $this->input->post('nama_masakan'),
					'harga' => $this->input->post('harga'),
					'status_masakan' => $this->input->post('status_masakan'),
					'id_restoran' => $this->input->post('id_restoran')
				);
			return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('masakan',$data);
		}
		
	}
	public function hapus($id_masakan)
	{
		return $this->db->where('id_masakan', $id_masakan)->delete('masakan');
	}


}

/* End of file model.php */
/* Location: ./application/modules/kasir/models/model.php */