<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_restoran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Get_restoran_model','gt_res');
	}
	public function index()
	{
		if ($this->session->userdata('logged')==true) 
		{
			$meja = $this->gt_res->get_p_meja();
			if ($meja==null) 
			{
				$data['konten_pel']='v_pilih_resto';
				$this->load->view('Template_pel', $data);	
			}
			else
			{
				$data['konten_pel']='v_pilih_resto';
				//$this->gt_res->hapus_all_meja();
				$this->load->view('Template_pel', $data);
			}
			
		}
		else
		{
			redirect('pelanggan/LandController','refresh');
		}
				
	}


	


}

/* End of file Daftar_restoran.php */
/* Location: ./application/modules/pelanggan/controllers/Daftar_restoran.php */