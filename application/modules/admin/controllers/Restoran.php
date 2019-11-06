<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restoran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Restoran_model','rm');
	}
	public function index()
	{
		if ($this->session->userdata('logged')==true) 
		{
			$data['konten']='v_restoran';
			$data['datares']=$this->rm->get_resto();
			$this->load->view('Template', $data);
		}
		else
		{
			redirect('admin/Login/index','refresh');
		}
		
	}
	public function proses_tambah()
	{
		$this->form_validation->set_rules('nama_restoran', 'Nama Restoran', 'trim|required');
		$this->form_validation->set_rules('alamat_restoran', 'Alamat Restoran', 'trim|required');
		$this->form_validation->set_rules('jmlh_meja', 'Jumlah Meja', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) 
		{
			if ($this->rm->tambah()) 
			{
				$this->session->set_flashdata('pesan','berhasil tambah');
			}
			else
			{
				$this->session->set_flashdata('pesan','gagal tambah');
			}
			redirect('admin/Restoran/index','refresh');
		} 
		else 
		{
			$this->session->flashdata('pesan',validation_errors());
			redirect('admin/Restoran/index','refresh');
		}
	}
	public function get_detail($id_restoran)
	{
		$dt = $this->rm->detail($id_restoran);
		echo json_encode($dt);
	}
	public function proses_update()
	{
		$this->form_validation->set_rules('nama_restoran', 'Nama Restoran', 'trim|required');
		$this->form_validation->set_rules('alamat_restoran', 'Alamat Restoran', 'trim|required');
		$this->form_validation->set_rules('jmlh_meja', 'Jumlah Meja', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) 
		{
			if ($this->rm->update()) 
			{
				$this->session->set_flashdata('pesan','berhasil ubah');
			}
			else
			{
				$this->session->set_flashdata('pesan','gagal ubah');
			}
			redirect('admin/Restoran/index','refresh');
		} 
		else 
		{
			$this->session->flashdata('pesan',validation_errors());
			redirect('admin/Restoran/index','refresh');
		}
	}
	public function hapus($id_restoran)
	{
		$hapus= $this->rm->hapus($id_restoran);
		if ($hapus==true) {
			$this->session->set_flashdata('pesan','berhasil hapus');
		}
		else
		{
			$this->session->set_flashdata('pesan','gagal hapus');
		}
		redirect('admin/Restoran/index','refresh');
	}


}

/* End of file Restoran.php */
/* Location: ./application/modules/admin/controllers/Restoran.php */