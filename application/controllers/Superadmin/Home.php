<?php
	class Home extends CI_Controller
	{
		public function __construct() {
	        parent::__construct();

	        if($this->session->userdata('account') == null) {
				redirect('Superdmin/Login');
			}
	    }

		function index()
		{
			$data['title'] = 'Ini adalah title Home';
			$data['description'] = 'Ini adalah description Home';
			$data['keywords'] = 'Ini adalah keywords Home';

          	$data['list'] = $this->M_superadmin_home->get_data_list();
			
			$this->load->view('Backend/Superadmin/V_home',$data);
		}

		function cek_username()
		{
            if($this->M_superadmin_home->cek_username($_POST["username"])){  
            	echo '<label class="text-danger"><span class="glyphicon glyphicon-remove" style="color:red;"> Username Sudah Digunakan </span>  </label>';  
            }
		}

		function Tambah_rs_klinik()
		{
			$data['title'] = 'Ini adalah title Tambah Data Rumah Sakit / Klinik';
			$data['description'] = 'Ini adalah description Tambah Data Rumah Sakit / Klinik';
			$data['keywords'] = 'Ini adalah keywords Tambah Data Rumah Sakit / Klinik';

			$data['data_username'] = $this->M_superadmin_home->list_username();
			
			$this->load->view('Backend/Superadmin/V_tambah_rs_klinik',$data);
		}

		function Tambah_data()
		{
			$username = $this->input->post('username');
			$password_old = $this->input->post('password');
			$password = hash ( "sha256", $password_old );
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$email = $this->input->post('email');
			$latitude = $this->input->post('latitude');
			$longtitude = $this->input->post('longtitude');

			$data = array(
                "username" => $username,
                "password" => $password,
                "nama_admin" => $nama,
                "alamat" => $alamat,
                "no_telp" => $no_telp,
                "email" => $email,
                "latitude" => $latitude,
                "longtitude" => $longtitude,
                "email" => $email
            ); 

            $this->M_superadmin_home->add_account($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Akun berhasil dibuat</div>');
            redirect('Superadmin/Home/Tambah_rs_klinik');
			
		}

		function Edit_rs_klinik($id_admin)
		{
			$data['title'] = 'Ini adalah title Edit Data Rumah Sakit / Klinik ';
			$data['description'] = 'Ini adalah description Edit Data Rumah Sakit / Klinik';
			$data['keywords'] = 'Ini adalah keywords Edit Data Rumah Sakit / Klinik';
			
			$data['data_admin'] = $this->M_superadmin_home->get_data_admin($id_admin);

			$this->load->view('Backend/Superadmin/V_edit_rs_klinik',$data);
		}

		function Edit_data()
		{
			$id_admin = $this->input->post('id_admin');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$email = $this->input->post('email');
			$latitude = $this->input->post('latitude');
			$longtitude = $this->input->post('longtitude');

			$data = array(
                "nama_admin" => $nama,
                "alamat" => $alamat,
                "no_telp" => $no_telp,
                "email" => $email,
                "latitude" => $latitude,
                "longtitude" => $longtitude,
                "email" => $email
            ); 

            $this->M_superadmin_home->edit_account($data,$id_admin);

            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil diubah</div>');
			redirect('Superadmin/Home/Edit_rs_klinik/'.$id_admin);
		}

		function Delete_rs_klinik()
		{
            $id_admin = $this->input->post('id_admin');
            $this->M_superadmin_home->delete_all_data_admin_booking($id_admin);
            $this->M_superadmin_home->delete_all_data_admin_jadwal_dokter($id_admin);
            $this->M_superadmin_home->delete_all_data_admin_dokter($id_admin);
            $this->M_superadmin_home->delete_all_data_admin($id_admin);
			redirect('Superadmin/Home');
		}
	}
?>	