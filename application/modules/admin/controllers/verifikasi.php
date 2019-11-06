<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('logged')==true) {
			$this->load->model('Verif_model');
			$data['data_pel']=$this->Verif_model->get_order();
			$data['konten']="v_tb_order";
			$this->load->view('Template', $data);
		}
		else
		{
			redirect('kasir/Login_kasir/index','refresh');
		}
    }

    public function tampil_nota()
	{
		if ($this->session->userdata('logged')==true) {
			$this->load->model('Verif_model');
			$data['data_nota']=$this->Verif_model->get_nota();
			$data['konten']="v_detail_order";
			$this->load->view('Template', $data);
		}
		else
		{
			redirect('kasir/Login_kasir/index','refresh');
		}
		
    }
    
    public function get_detail_order($id_order)
   	 {
        $this->load->model('Verif_model','vm');
        $data_detail = $this->vm->detail($id_order);
        echo json_encode($data_detail);
        
    }

    public function update()
    {
        $this->load->model('verif_model','vm');
        $this->form_validation->set_rules('ubah_status','fieldlabel','trim|required');
        
        if ($this->form_validation->run() == TRUE) 
		{
			if ($this->vm->update()) 
			{
				$this->session->flashdata('pesan','berhasil ubah');
			}
			else
			{
				$this->session->flashdata('pesan','gagal ubah');
			}
			redirect('admin/verifikasi','refresh');
		} 
		else 
		{
			$this->session->flashdata('pesan',validation_errors());
			redirect('admin/verifikasi','refresh');
		}
		
	}

    public function cetak_nota($id_order){
    	if ($this->session->userdata('logged')==true) 
    	{
    		 $this->load->model('Verif_model','vm');
	        $data['data_order'] = $this->vm->cetak($id_order);
	        $this->load->view('v_cetak_nota',$data);
    	}
    	else
    	{
    		redirect('kasir/Login_kasir/index','refresh');
    	}
       
        
        
    }

    public function cari()
	{
		if ($this->session->userdata('logged')==true) 
		{
			$tgl = $this->input->post('tanggal');
			if($tgl == null)
			{
				redirect('/admin/Verifikasi/tampil_nota','refresh');
			} 
			else
			{
				$data['konten']="v_detail_order";
				$this->load->model('Verif_model');
				$data['data_nota']=$this->Verif_model->cari($tgl);
				$this->load->view('Template', $data);
			}
		}
		else
		{
			redirect('kasir/login_kasir/index','refresh');
		}
		
	}
}