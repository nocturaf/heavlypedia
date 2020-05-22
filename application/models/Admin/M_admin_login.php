<?php
	class M_admin_login extends CI_Model
	{
		function getAccount($data_account) {
			$query = $this->db->get_where('akun_admin', $data_account);
			if ($query->num_rows() != 0) {
				return $query->row();
			} else {
				return array();
			}
		}

		function get_data_jum_pasien($id_admin) {
			$query = $this->db->query("SELECT count(DISTINCT id_pasien) FROM booking WHERE id_admin = '$id_admin'");
            return $query->result_array();
		}

		function get_data_jum_dokter($id_admin) {
			$query = $this->db->query("SELECT count(DISTINCT id_dokter) FROM dokter WHERE id_admin = '$id_admin'");
            return $query->result_array();
		}

		function get_data_jum_booking($id_admin) {
			$query = $this->db->query("SELECT count(id_booking) FROM booking WHERE id_admin = '$id_admin'");
            return $query->result_array();
		}

		function list_username(){
			$data = $this->db->query("SELECT username FROM akun_admin");
    		return $data->result_array();
		}

		function get_email($username){
			$data = $this->db->query("SELECT password,email FROM akun_admin WHERE username = '$username'");
    		return $data->result_array();
		}

		function cari_akun($password){
			$data = $this->db->query("SELECT username FROM akun_admin WHERE password = '$password'");
    		return $data->result_array();
		}

		function reset_password($data,$username) {
			$this->db->where("username", $username);
			$this->db->update("akun_admin", $data);
		}
	}

?>