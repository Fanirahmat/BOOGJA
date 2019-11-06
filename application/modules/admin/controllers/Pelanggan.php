<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model','pm');
	}
	public function index()
	{
		if ($this->session->userdata('logged')==true) 
		{
			$data['konten']='v_pelanggan';
			$data['data_pel']=$this->pm->get_pelanggan();
			$this->load->view('Template', $data);
		}
		else
		{
			redirect('admin/Login/index','refresh');
		}
		
	}
	public function proses_hapus($id_pelanggan)
	{
		$hapus = $this->pm->hapus($id_pelanggan);
			if ($hapus) {
				$this->session->set_flashdata('pesan','berhasil hapus');
			}
			else
			{
				$this->session->set_flashdata('pesan','gagal hapus');
			}
			redirect('admin/Pelanggan/index','refresh');
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/modules/admin/controllers/Pelanggan.php */