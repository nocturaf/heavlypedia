<?php
	define("FCM_API_KEY", getenv("FCM_API_KEY"));
	class List_booking extends CI_Controller
	{
		function __contruct(){
			parent::__construct();
			
		}

		function index()
		{
			$data['title'] = 'Ini adalah title List Booking';
			$data['description'] = 'Ini adalah description List Booking';
			$data['keywords'] = 'Ini adalah keywords List Booking';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);
          	$data['list'] = $this->M_admin_list_booking->get_data_list($id_admin);	

          	$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);
			
			$this->load->view('Backend/Admin/V_list_booking',$data);
		}

		function Konfirmasi_booking()
		{
			$data['title'] = 'Ini adalah title List Booking';
			$data['description'] = 'Ini adalah description List Booking';
			$data['keywords'] = 'Ini adalah keywords List Booking';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$id_booking = $this->input->post('id_booking');

			$nama_rs = "";
			$this->db->where('id_admin', $id_admin);
			$rs = $this->db->get('akun_admin')->result();
			foreach ($rs as $row) {
				$nama_rs = $row->nama_admin;
			}

			$id_pasien = "";
			$this->db->where('id_booking', $id_booking);
			$pasien = $this->db->get('booking')->result();
			foreach ($pasien as $row) {
				$id_pasien = $row->id_pasien;
			}

			$gcmRegId = "";
			$this->db->where('id_pasien', $id_pasien);
			$pasienData = $this->db->get('akun_pasien', $id_pasien)->result();
			foreach ($pasienData as $pas) {
				$gcmRegId = $pas->gcm_reg_id;
			}

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);

			$id_booking = $this->input->post('id_booking');
			$status = "Dikonfirmasi";
			$data = array(
                "status" => $status
            );

            $this->M_admin_list_booking->konfirmasi_booking($data,$id_booking);
			$this->send_notif_confirm($gcmRegId, array(
				'title' => 'Status reservasi : '.$status,
				'body' => $nama_rs.' telah mengkonfirmasi reservasi kamu'
			));
            redirect('Admin/List_booking');
		}

		function send_notif_confirm($to, $data)
		{
			$fields = array(
				'to' => $to,
				'notification' => $data
			);
			$headers = array(
				'Authorization: key='.FCM_API_KEY, 'Content-Type: application/json'
			);
			$url = 'https://fcm.googleapis.com/fcm/send';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$result = curl_exec($ch);
			return $result;
		}

		function Refresh()
		{
			$data['title'] = 'Ini adalah title List Booking';
			$data['description'] = 'Ini adalah description List Booking';
			$data['keywords'] = 'Ini adalah keywords List Booking';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);

			date_default_timezone_set("Asia/Bangkok");
			$data_booking = $this->M_admin_list_booking->get_data_list($id_admin);
          	
          	foreach ($data_booking as $p) {
          		$id_booking = $p['id_booking'];
          		$tgl_booking = $p['tgl_booking'];
          		$status = $p['status'];
          		$status_new = 'Tidak Berlaku';

          		$n_date = explode(" ", $tgl_booking);
				$n_day = $n_date[1];
				$n_month = $n_date[2];
				$n_year = $n_date[3];

				if($n_month == 'January'){
					$n_month = '01';
				}
				else if($n_month == 'February'){
					$n_month = '02';
				}
				else if($n_month == 'March'){
					$n_month = '03';
				}
				else if($n_month == 'April'){
					$n_month = '04';
				}
				else if($n_month == 'May'){
					$n_month = '05';
				}
				else if($n_month == 'June'){
					$n_month = '06';
				}
				else if($n_month == 'July'){
					$n_month = '07';
				}
				else if($n_month == 'August'){
					$n_month = '08';
				}
				else if($n_month == 'September'){
					$n_month = '09';
				}
				else if($n_month == 'October'){
					$n_month = '10';
				}
				else if($n_month == 'November'){
					$n_month = '11';
				}
				else if($n_month == 'December'){
					$n_month = '12';
				}

				$temp_date = $n_day."-".$n_month."-".$n_year;
				$new_date = $temp_date;
				$now_date = date("d-m-Y");

				if(($new_date < $now_date) and ($status == 'Menunggu Konfirmasi')){
					$data = array(
		                "status" => $status_new
		            ); 
		            $this->M_admin_list_booking->update_status($data,$id_booking);
				}
          	}

            redirect('Admin/List_booking');
		}

		function Search()
		{
			$data['title'] = 'Ini adalah title List Booking';
			$data['description'] = 'Ini adalah description List Booking';
			$data['keywords'] = 'Ini adalah keywords List Booking';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);
			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$search = $this->input->post('search');
          	$data['list'] = $this->M_admin_list_booking->search_data($id_admin,$search);          	
			
			$this->load->view('Backend/Admin/V_list_booking',$data);
		}
	}
?>	