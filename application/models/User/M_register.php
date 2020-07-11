<?php
	class M_register extends CI_Model
	{
		function cek_username($username){		
			$this->db->where('username', $username);  
        	$query = $this->db->get("akun_pasien");  
       		if($query->num_rows() > 0){  
                return true;  
           	}  
           	else {  
                return false;  
           	}  
		}

        function check_phone_number($phoneNumber){
            $this->db->where('no_telp', $phoneNumber);
            $query = $this->db->get("akun_pasien");
            if($query->num_rows() > 0){
                return true;
            }
            else {
                return false;
            }
        }

        function validate_user_duplication($data) {
		    $userPhoneNumber = $data['no_telp'];
		    $userEmail = $data['email'];
		    $username = $data['username'];

		    $this->db->where('no_telp', $userPhoneNumber);
		    $checkPhoneNumber = $this->db->get('akun_pasien')->num_rows();
            $this->db->where('email', $userEmail);
            $checkEmail = $this->db->get('akun_pasien')->num_rows();
            $this->db->where('username', $username);
            $checkUsername = $this->db->get('akun_pasien')->num_rows();
            if($checkPhoneNumber > 0) {
                return "phone";
            }
            if($checkEmail > 0) {
                return "email";
            }
            if($checkUsername > 0) {
                return "username";
            }
            return "ok";
        }

		function add_account($data){
		    return $this->db->insert('akun_pasien', $data);
		}

		function validate_user_otp($phoneNumber) {
		    $this->db->where('no_telp', $phoneNumber);
		    $query = $this->db->get('akun_pasien');
            return $query->result_array();
        }

        function getUserByPhoneNumber($phoneNumber) {
		    $this->db->where('no_telp', $phoneNumber);
		    $query = $this->db->get('akun_pasien');
		    return $query->result();
        }

        function update_user_otp($phoneNumber, $newOtp) {
            $this->db->set('otp', $newOtp);
            $this->db->where('no_telp', $phoneNumber);
            $update = $this->db->update('akun_pasien');
            if($update) {
                return true;
            } else {
                return false;
            }
        }

		function list_username(){
			$data = $this->db->query("SELECT username FROM akun_pasien");
    		return $data->result_array();
		}

		function get_email($username){
			$data = $this->db->query("SELECT password,email FROM akun_pasien WHERE username = '$username'");
    		return $data->result_array();
		}

		function cari_akun($password){
			$data = $this->db->query("SELECT username FROM akun_pasien WHERE password = '$password'");
    		return $data->result_array();
		}

		function reset_password($data,$username) {
			$this->db->where("username", $username);
			$this->db->update("akun_pasien", $data);
		}
	}

?>