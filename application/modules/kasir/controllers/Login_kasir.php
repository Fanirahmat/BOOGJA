<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_kasir_model','lkm');
	}
	public function index()
	{
		$this->load->view('v_login_kasir');		
	}
	public function proses_login()
	{
		if ($this->session->userdata('logged')==false) 
		{
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == true) 
			{
				if ($this->lkm->cek_login()) {
					redirect('Dashboard/index','refresh');
				}
				else
				{
					$this->session->set_flashdata('pesan', 'gagal login');
					redirect('kasir/Login_kasir/index','refresh');
				}
			} 
			else 
			{
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('kasir/Login_kasir/index','refresh');
			}
		}
		else
		{
			redirect('Template/index','refresh');
		}
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/kasir/Login_kasir/index'),'refresh');
	}

}

/* End of file Login_kasir.php */
/* Location: ./application/modules/kasir/controllers/Login_kasir.php */