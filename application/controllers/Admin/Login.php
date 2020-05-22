<?php
	class Login extends CI_Controller
	{
		function __contruct(){
			parent::__construct();
		}

		function index()
		{
			$data['title'] = 'Ini adalah title Login';
			$data['description'] = 'Ini adalah description Login';
			$data['keywords'] = 'Ini adalah keywords Login';
			
			$this->load->view('Backend/Admin/V_login',$data);
		}

		function login_akun() {
			$username = $this->input->post('username');
			$password_old = $this->input->post('password');
			$password = hash ( "sha256", $password_old );

			$data = array(
				'username' => $username,
				'password' => $password
			);

			$result = $this->M_admin_login->getAccount($data);

			if ($result) {
				$data_account = array(
					'username' => $result->username,
					'nama' => $result->nama_admin,
					'id_admin' => $result->id_admin,
				);

				$this->session->set_userdata('account', $data_account);
				
				redirect('Admin/Home');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Login gagal !</div>');
				redirect('Admin/Login');
			}
		}

		function logout(){
			$this->session->sess_destroy();
			redirect("Admin/Login");
		}

		function Reset_password($kode)
		{
			$data['title'] = 'Ini adalah title Reset Password';
			$data['description'] = 'Ini adalah description Reset Password';
			$data['keywords'] = 'Ini adalah keywords Reset Password';

			$data['data_akun'] = $this->M_admin_login->cari_akun($kode);
			
			$this->load->view('Backend/Admin/V_reset_password',$data);
		}

		function Confirm_reset_password()
		{
			$username = $this->input->post('username');
			$password_old = $this->input->post('password');
			$password = hash ( "sha256", $password_old );
			$data = array(
                "password" => $password,
            ); 

			$this->M_admin_login->reset_password($data,$username);

			$data_email = $this->M_admin_login->get_email($username);
			$email = $data_email[0]['email'];

			$my_email = 'heavlypedia@gmail.com';
			$my_password = 'heavlypedia123';
			$my_name = 'Heavlypedia Customer Service';
			$my_message = 'Hai pelanggan terhormat, password akun anda telah kami ubah dengan password baru anda. Terima kasih atas menggunakan aplikasi Heavlypedia. <br><br>'. $my_name;

			$config = Array(
	                'protocol' => 'smtp',
	                'smtp_host' => 'ssl://smtp.googlemail.com',
	                'smtp_port' => 465,
	                'smtp_user' => $my_email,
	                'smtp_pass' => $my_password,
	                'mailtype'  => 'html', 
	                'charset'   => 'iso-8859-1',
	                'wordwrap'  => TRUE
	        );

            $this->load->library('email', $config);
            $this->email->from($my_email, $my_name); 
            $this->email->to($email);
            $this->email->subject('Reset Password Successful');
            $this->email->message($my_message); 
            $this->email->set_newline("\r\n");    
            $this->email->send();  

             $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Password Berhasil Diubah !</div>');    

	        redirect('Admin/Login');
			
		}

		function Forget_password()
		{
			$data['title'] = 'Ini adalah title Forget Password';
			$data['description'] = 'Ini adalah description Forget Password';
			$data['keywords'] = 'Ini adalah keywords Forget Password';

			$data['data_username'] = $this->M_admin_login->list_username();
			
			$this->load->view('Backend/Admin/V_forget_password',$data);
		}

		function Confirm_forget_password()
		{
			$username = $this->input->post('username');
			$data_email = $this->M_admin_login->get_email($username);
			$password = $data_email[0]['password'];
			$email = $data_email[0]['email'];
			$my_email = 'heavlypedia@gmail.com';
			$my_password = 'heavlypedia123';
			$my_name = 'Heavlypedia Customer Service';
			$my_message = 'Hai pelanggan terhormat, untuk reset password akun silahkan klik link berikut <br>
			http://localhost/heavlypedia/Admin/Login/Reset_password/'.$password;

			$config = Array(
	                'protocol' => 'smtp',
	                'smtp_host' => 'ssl://smtp.googlemail.com',
	                'smtp_port' => 465,
	                'smtp_user' => $my_email,
	                'smtp_pass' => $my_password,
	                'mailtype'  => 'html', 
	                'charset'   => 'iso-8859-1',
	                'wordwrap'  => TRUE
	        );

            $this->load->library('email', $config);
            $this->email->from($my_email, $my_name); 
            $this->email->to($email);
            $this->email->subject('Reset Password');
            $this->email->message($my_message); 
            $this->email->set_newline("\r\n");    
            $this->email->send();  

            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Silahkan cek email akun yang terkait</div>');  

	        redirect('Admin/Login');
			
		}
	}
?>	