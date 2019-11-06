<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model','lm');
	}
	public function index()
	{
		$this->load->view('v_login');		
	}
	public function proses_login()
	{
		if ($this->session->userdata('logged')==false) 
		{
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == true) 
			{
				if ($this->lm->cek_login()) {
					redirect('Dashboard/index','refresh');
				}
				else
				{
					$this->session->set_flashdata('pesan', 'gagal login');
					redirect('admin/Login/index','refresh');
				}
			} 
			else 
			{
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('admin/Login/index','refresh');
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
		redirect(base_url('admin/Login/index'),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/modules/admin/controllers/Login.php */