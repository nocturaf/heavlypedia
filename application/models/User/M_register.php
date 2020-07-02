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

		function add_account($data){
			return $this->db->insert("akun_pasien", $data);
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