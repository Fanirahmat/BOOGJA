<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_pelanggan_model','lpm');
	}
	public function index()
	{
		$this->load->view('v_login_pelanggan');
	}
	public function proses_login()
	{
		if ($this->session->userdata('logged')==false) 
		{

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$user = $this->db->get_where('pelanggan', ['username' => $username])->row_array();
				if ($user) 
				{
					if ($user['is_actived']==1) 
					{
						if (password_verify($password,$user['password'])) 
						{
							$data = [
								'id_pelanggan' => $user['id_pelanggan'],
								'username' => $user['username'],
								'logged' => true
							];

							$this->session->set_userdata($data);
							redirect('Dashboard/Dashboard_pelanggan','refresh');
						}
						else
						{
							$this->session->set_flashdata('pesan','Password Salah');
							redirect('pelanggan/LandController','refresh');
						}
					}
					else
					{
						$this->session->set_flashdata('pesan','Username belum aktivasi');
						redirect('pelanggan/LandController','refresh');
					}
				}
				else
				{
					$this->session->set_flashdata('pesan','Username belum terdaftar');
					redirect('pelanggan/LandController','refresh');
				}

			} 
		 
		else
		{
			$this->session->set_flashdata('pesan','session yg sebelumnya belum dilogout');
			redirect('pelanggan/LandController','refresh');
		}
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/pelanggan/LandController'),'refresh');
	}

	public function proses_daftar()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[pelanggan.email]',[
			'is_unique' => 'email sudah didaftarkan'
		]);
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('telp', 'telp', 'trim|required|is_unique[pelanggan.telp]' , [
			'is_unique' => 'nomor ini sudah terdaftar akun'
		]);
		$this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[pelanggan.username]', [
			'is_unique' => 'username sudah dipakai'
		]);
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]',[
			'min_length' => 'Password Kurang panjang'
		]);
		

		if($this->form_validation->run()== true)
		{
			//memnyiapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $this->input->post('email'),
				'token' => $token,
				'date_created' => time()
			];

			$this->lpm->daftar();
			$this->db->insert('user_token', $user_token);
			$this->_sendEmail($token, 'verify');
			$this->session->set_flashdata('pesan_login', '<div class="alert alert-warning">Akun anda sudah didaftarkan, silahkan cek email untuk aktifasi</div>');
			redirect('pelanggan/LandController/alert','refresh');
			
		} 
		else
		{
			$this->load->view('v_form_daftar');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'boogjaofc@gmail.com',
			'smtp_pass' => 'Bookingsaja123',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->from('boogjaofc@gmail.com','Booking Saja Official');
		$this->email->to($this->input->post('email'));
		if ($type == 'verify') 
		{
			$this->email->subject('Account Verification');
			$this->email->message('Click This link to verify your account : <a href="'. base_url() .'index.php/pelanggan/Login_pelanggan/verify?email='. 
				$this->input->post('email') . '&token='. urlencode($token) .'">Activate</a>');
		}
		else if($type == 'forgot')
		{
			$this->email->subject('Reset Password');
			$this->email->message('Click This link to reset your password : <a href="'. base_url() .'index.php/pelanggan/Login_pelanggan/resetpassword?email='. 
				$this->input->post('email') . '&token='. urlencode($token) .'">Reset password</a>');
		}
		

		if ($this->email->send()) {
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

		if ($user) {
				
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if ($user_token['date_created'] < date("Y-m-d h:i:sa")) {
					$this->db->set('is_actived', 1);
					$this->db->where('email', $email);
					$this->db->update('pelanggan');
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('pesan_login', '<div class="alert alert-success">'. $email .' telah aktif </div>');
					redirect('pelanggan/LandController//alert','refresh');
				}
				else
				{
					$this->db->delete('pelanggan', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('pesan_login', '<div class="alert alert-danger">Activation Failed; Token Kadaluarsa</div>');
					redirect('pelanggan/LandController/alert','refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('pesan_login', '<div class="alert alert-danger">Activation Failed; Token Salah</div>');
				redirect('pelanggan/LandController/alert','refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan_login', '<div class="alert alert-danger">Activation Failed; Email Salah</div>');
			redirect('pelanggan/LandController/alert','refresh');
		}
	}
	
	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('v_lupa_password');
		} 
		else 
		{
			$email = $this->input->post('email');
			$user = $this->db->get_where('pelanggan', ['email' => $email, 'is_actived' => 1])->row_array();

			if ($user) 
			{
				$token = base64_encode(random_bytes(32));
				$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('pesan_login', '<div class="alert alert-success">cek email untuk reset password</div>');
			    redirect('pelanggan/LandController/alert','refresh');

			}
			else
			{
				$this->session->set_flashdata('pesan_login', '<div style="color: red;">Email Tidak terdaftar atau belum activation</div>');
			    redirect('pelanggan/Login_pelanggan/forgotPassword','refresh');
			}
		}
		
	}
	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('pelanggan', ['email' => $email])->row_array();
		if ($user) 
		{
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email',$email);
				$this->changePassword();
				$this->db->delete('user_token', ['email' => $email]);
			}
			else
			{
				$this->session->set_flashdata('pesan_login', '<div class="alert alert-danger">Reset Failed; Token Salah</div>');
				redirect('pelanggan/LandController/alert','refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan_login', '<div class="alert alert-danger">Reset Password gagal, email Salah</div>');
			redirect('pelanggan/LandController/alert','refresh');
		}
	}
	public function changePassword()
	{
		if (!$this->session->userdata('reset_email'))  
		{
			redirect('pelanggan/LandController/alert','refresh');
		}
		else
		{
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]',[
			'min_length' => 'Password Kurang panjang'
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('v_ubah_password');
			} 
			else 
			{
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$email = $this->session->userdata('reset_email');

				$data = array('password' => $password );
				$this->db->where('email', $email)->update('pelanggan', $data);
				$this->session->unset_userdata('reset_email');

				$this->session->set_flashdata('pesan_login', '<div class="alert alert-success">Password Telah diubah</div>');
				redirect('pelanggan/LandController/alert','refresh');
			}
		}
		
		
	}
}

/* End of file Login.php */
/* Location: ./application/modules/pelanggan/controllers/Login.php */