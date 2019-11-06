<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengurus_model','um');
	}
	public function index()
	{
		if ($this->session->userdata('logged')==true) 
		{
			$data['konten']="v_pengurus";
			$data['data_pengurus']=$this->um->get_pengurus();
			$data['level']=$this->um->get_level();
			$this->load->view('Template', $data);
		}
		else
		{
			redirect('admin/Login/index','refresh');
		}
		
	}
	public function detail($id_pengurus)
	{
		$dt = $this->um->detail($id_pengurus);
		echo json_encode($dt);
	}
	
	

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */