<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restoran_model extends CI_Model {

	public function get_resto()
	{
		return $this->db->query("SELECT R.*,COUNT(RM.id_meja) as jumlah_meja FROM `restoran` R LEFT JOIN restoran_meja RM USING(id_restoran) GROUP BY id_restoran")->result();
		
	}
	public function tambah()
	{
		$config['upload_path'] = './assets/gambar';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '10009000000000000000000000000';
		$config['max_width']  = '1024000000';
		$config['max_height']  = '7680000000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$this->session->set_flashdata('pesan',$this->upload->display_errors());
		}
		else
		{
			$data = array('nama_restoran' => $this->input->post('nama_restoran'),
							'gambar' => $this->upload->data('file_name'),
							'alamat_restoran' => $this->input->post('alamat_restoran'),
							'jmlh_meja' => $this->input->post('jmlh_meja')
						);
				

			return $this->db->insert('restoran', $data);
		}
	}
	public function detail($id_restoran)
	{
		return $this->db->where('id_restoran', $id_restoran)->get('restoran')->row();
	}
	public function update()
	{
		$nama_gambar = $_FILES['gambar']['name'];
		if ($nama_gambar!=null) 
		{
			$config['upload_path'] = './assets/gambar';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '1000000000000000000000000000';
			$config['max_width']  = '10240000000000000000000000000000';
			$config['max_height']  = '768000000000000000000000000000000000000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$this->session->set_flashdata('pesan',$this->upload->display_errors());
			}
			else
			{
				$data = array('nama_restoran' => $this->input->post('nama_restoran'),
							'gambar' => $this->upload->data('file_name'),
							'alamat_restoran' => $this->input->post('alamat_restoran'),
							'jmlh_meja' => $this->input->post('jmlh_meja')
						);
				return $this->db->where('id_restoran', $this->input->post('id_restoran'))->update('restoran',$data);
			}
		}
		else
		{
			$data = array('nama_restoran' => $this->input->post('nama_restoran'),
							'alamat_restoran' => $this->input->post('alamat_restoran'),
							'jmlh_meja' => $this->input->post('jmlh_meja'),
						);
			return $this->db->where('id_restoran', $this->input->post('id_restoran'))->update('restoran',$data);
		}
	}
	public function hapus($id_restoran)
	{
		return $this->db->where('id_restoran', $id_restoran)->delete('restoran');
	}

}

/* End of file Restoran_model.php */
/* Location: ./application/modules/admin/models/Restoran_model.php */