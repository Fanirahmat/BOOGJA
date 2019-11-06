<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Riwayat_model','rm');
	}
	public function index()
	{
		if ($this->session->userdata('logged')==true) 
		{
			$data['konten_pel']='v_riwayat';
		    $this->load->view('Template_pel', $data);
		}
		else
		{
			redirect('pelanggan/LandController','refresh');
		}
		
	}
	public function tampil_riwayat()
	{
		$dt = $this->rm->get_riwayat();
		echo json_encode($dt);
	}

}

/* End of file Riwayat.php */
/* Location: ./application/modules/pelanggan/controllers/Riwayat.php */