<?php
	class Register extends CI_Controller
	{
		function __contruct(){
			parent::__construct();
		}

		function index()
		{
			$data['title'] = 'Ini adalah title Register';
			$data['description'] = 'Ini adalah description Register';
			$data['keywords'] = 'Ini adalah keywords Register';

			$data['data_username'] = $this->M_register->list_username();
			
			$this->load->view('Backend/User/V_register',$data);
		}

		function cek_username()
		{
            if($this->M_register->cek_username($_POST["username"])){  
            	echo '<label class="text-danger"><span class="glyphicon glyphicon-remove" style="color:red;"> Username Sudah Digunakan </span>  </label>';  
            }
		}

		function register_akun()
		{
			$username = $this->input->post('username');
			$password_old = $this->input->post('password');
			$password = hash ( "sha256", $password_old );
			$nama = $this->input->post('nama');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$email = $this->input->post('email');

			$temp = explode("/", $tgl_lahir);
			$temp_1 = $temp[2]."-".$temp[1]."-".$temp[0];
			$temp2 = strtotime('$temp_1');

			$hari = date('l', $temp2);
			$tanggal = $temp[0];
			$bulan = date('F', $temp2);
			$tahun = $temp[2];

			$tgl_lahir_fix = $hari." ".$tanggal." ".$bulan." ".$tahun;

			$data = array(
                "username" => $username,
                "password" => $password,
                "nama_pasien" => $nama,
                "tgl_lahir" => $tgl_lahir_fix,
                "jenis_kelamin" => $jenis_kelamin,
                "alamat" => $alamat,
                "no_telp" => $no_telp,
                "email" => $email
            ); 

            $this->M_register->add_account($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Akun berhasil dibuat</div>');
            redirect('Register');
			
		}

		function Sukses_terkirim()
		{
			$data['title'] = 'Ini adalah title Sukses Terkirim';
			$data['description'] = 'Ini adalah description Sukses Terkirim';
			$data['keywords'] = 'Ini adalah keywords Sukses Terkirim';
			$data['judul'] = 'Email Telah Terkirim !';
			$data['isi'] = 'Silahkan cek email anda dari Heavlypedia Customer Service';
			
			$this->load->view('Backend/User/V_sukses_terkirim',$data);
		}

		function Reset_password_sukses()
		{
			$data['title'] = 'Ini adalah title Sukses Terkirim';
			$data['description'] = 'Ini adalah description Sukses Terkirim';
			$data['keywords'] = 'Ini adalah keywords Sukses Terkirim';
			$data['judul'] = 'Reset Password Berhasil !';
			$data['isi'] = 'Terima Kasih Telah Menggunakan Aplikasi Heavlypedia';
			
			$this->load->view('Backend/User/V_sukses_terkirim',$data);
		}

		function Reset_password($kode)
		{
			$data['title'] = 'Ini adalah title Reset Password';
			$data['description'] = 'Ini adalah description Reset Password';
			$data['keywords'] = 'Ini adalah keywords Reset Password';

			$data['data_akun'] = $this->M_register->cari_akun($kode);
			
			$this->load->view('Backend/User/V_reset_password',$data);
		}

		function Confirm_reset_password()
		{
			$username = $this->input->post('username');
			$password_old = $this->input->post('password');
			$password = hash ( "sha256", $password_old );
			$data = array(
                "password" => $password,
            ); 

			$this->M_register->reset_password($data,$username);

			$data_email = $this->M_register->get_email($username);
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

	        redirect('Register/Reset_password_sukses');
			
		}

		function Forget_password()
		{
			$data['title'] = 'Ini adalah title Forget Password';
			$data['description'] = 'Ini adalah description Forget Password';
			$data['keywords'] = 'Ini adalah keywords Forget Password';

			$data['data_username'] = $this->M_register->list_username();
			
			$this->load->view('Backend/User/V_forget_password',$data);
		}

		function Confirm_forget_password()
		{
			$username = $this->input->post('username');
			$data_email = $this->M_register->get_email($username);
			$password = $data_email[0]['password'];
			$email = $data_email[0]['email'];
			$my_email = getenv('EMAIL_USER');
			$my_password = getenv('EMAIL_PASS');
			$my_name = 'Heavlypedia Customer Service';
			$my_message = 'Hai pelanggan terhormat, untuk reset password akun silahkan klik link berikut <br>'.base_url().'/Register/Reset_password/'.$password;

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => '465',
				'smtp_timeout' => '7',
				'smtp_user' => $my_email,
				'smtp_pass' => $my_password,
				'mailtype'  => 'html',
				'newline'  => "\r\n",
				'charset'   => 'utf-8'
	        );

            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->from($my_email, $my_name);
            $this->email->to($email);
            $this->email->subject('Reset Password');
            $this->email->message($my_message); 
            $this->email->send();

	        redirect('Register/Sukses_terkirim');
			
		}
	}
?>	