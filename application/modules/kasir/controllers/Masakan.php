<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Masakan_model','mm');
	}
	public function index()
	{
		if ($this->session->userdata('logged')==true) 
		{
			$data['data_mas']=$this->mm->get_masakan();
			$data['data_res']=$this->mm->get_resto();
			$data['konten']='v_masakan';
			$this->load->view('Template', $data);
		}
		else
		{
			redirect('kasir/Login_kasir/index','refresh');
		}
				
	}
	public function proses_tambah()
	{
		$this->form_validation->set_rules('nama_masakan', 'Nama Masakan', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('status_masakan', 'Status Masakan', 'trim|required');

		if ($this->form_validation->run() == TRUE) 
		{
			if ($this->mm->tambah()) 
			{
				$this->session->set_flashdata('pesan','berhasil tambah');
			}
			else
			{
				$this->session->set_flashdata('pesan','gagal tambah');
			}
			redirect('Kasir/Masakan/index','refresh');
		} 
		else 
		{
			$this->session->flashdata('pesan',validation_errors());
			redirect('Kasir/Masakan/index','refresh');
		}
	}

		public function detail($id_masakan)
		{
			$dt = $this->mm->detail($id_masakan);
			echo json_encode($dt);
		}

	public function proses_update()
		{
			$this->form_validation->set_rules('nama_masakan', 'Nama Masakan', 'trim|required');
			$this->form_validation->set_rules('harga', 'harga', 'trim|required');
			$this->form_validation->set_rules('status_masakan', 'Status Masakan', 'trim|required');

			if ($this->form_validation->run() == TRUE) 
			{
				if ($this->mm->update()) 
				{
					$this->session->set_flashdata('pesan','berhasil ubah');
				}
				else
				{
					$this->session->set_flashdata('pesan','gagal ubah');
				}
				redirect('Kasir/Masakan/index','refresh');
			} 
			else 
			{
				$this->session->flashdata('pesan',validation_errors());
				redirect('Kasir/Masakan/index','refresh');
			}
		}
		public function hapus($id_masakan)
		{
			$hapus = $this->mm->hapus($id_masakan);
			if ($hapus == TRUE) {
				$this->session->set_flashdata('pesan','berhasil hapus');
			}
			else
			{
				$this->session->set_flashdata('pesan','gagal hapus');
			}
			redirect('Kasir/Masakan/index','refresh');
		}


}

/* End of file masakan.php */
/* Location: ./application/modules/kasir/controllers/masakan.php */