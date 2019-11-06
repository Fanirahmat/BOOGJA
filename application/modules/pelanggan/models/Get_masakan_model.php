<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_masakan_model extends CI_Model {

	public function get_masakan($id_restoran)
	  {
		return $this->db->join('restoran','restoran.id_restoran=masakan.id_restoran')
                    ->where('restoran.id_restoran',$id_restoran)
                    ->get('masakan')
                    ->result();
    }
  
  public function  get_detail_mas($id_masakan)
    {
      return $this->db->where('id_masakan',$id_masakan)
                  ->get('masakan')->row();
    }
  
  public function get_last_order()
    {
      return $this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'))
                  ->limit('1')
                  ->order_by('id_order','desc')
                  ->limit('1')
                  ->get('tb_order')
                  ->row();
    }  
  
  public function buat_order()
    {
      $status = "proses";
      $data = array('id_pelanggan' => $this->session->userdata('id_pelanggan'),
              'tanggal' => date('Y-m-d'),
              'status_order' => $status
               );
      return $this->db->insert('tb_order', $data);
    }
    
  public function update_total($id_order)
    {
      $data = array('total_bayar' => $this->cart->total(),
              );
  
      return $this->db->where('id_order', $id_order)->update('tb_order',$data);
    }
    public function update_bukti()
    {
      $data = array('bukti' => $this->upload->data('file_name'));
      return $this->db->where('id_order', $this->input->post('id_order'))->update('tb_order',$data);
      
    }

   
}