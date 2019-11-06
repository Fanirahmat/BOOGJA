<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandController extends CI_Controller {

	public function index()
	{
		$this->load->view('pelanggan/land');		
	}
	public function form_daftar()
	{
		$this->load->view('v_form_daftar');
	}
	public function landresto()
	{
		$data['konten_pel']='v_landresto';
		$this->load->view('Template_pel', $data);
	}

	public function about()
	{
		$data['konten_pel']='v_about';
		$this->load->view('Template_pel', $data);
	}

	public function contact()
	{
		$data['konten_pel']='v_contact';
		$this->load->view('Template_pel', $data);
	}
	public function alert()
	{
		$this->load->view('v_alert');
	}
	
}

/* End of file LandController.php */
/* Location: ./application/controllers/LandController.php */