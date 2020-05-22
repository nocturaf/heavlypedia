<?php
	class M_superadmin_home extends CI_Model
	{
		function get_data_list() {
			$this->db->order_by("nama_admin", "ASC");
            return $this->db->get('akun_admin')->result_array();
		}

		function list_username(){
			$data = $this->db->query("SELECT username FROM akun_admin");
    		return $data->result_array();
		}

		function cek_username($username){		
			$this->db->where('username', $username);  
        	$query = $this->db->get("akun_admin");  
       		if($query->num_rows() > 0){  
                return true;  
           	}  
           	else {  
                return false;  
           	}  
		}

		function add_account($data){
			$this->db->insert("akun_admin", $data);
		}

		function get_data_admin($id_admin) {
			$this->db->where('id_admin',$id_admin);
            return $this->db->get('akun_admin')->result_array();
		}

		function edit_account($data,$id_admin){
			$this->db->where('id_admin', $id_admin);
			$this->db->update("akun_admin", $data);
		}

		function delete_all_data_admin_booking($id_admin)
		{
			$this->db->where('id_admin',$id_admin);
			$this->db->delete('booking');
		}

		function delete_all_data_admin_jadwal_dokter($id_admin)
		{
			$this->db->where('id_admin',$id_admin);
			$this->db->delete('jadwal_dokter');
		}
		function delete_all_data_admin_dokter($id_admin)
		{
			$this->db->where('id_admin',$id_admin);
			$this->db->delete('dokter');
		}
		function delete_all_data_admin($id_admin)
		{
			$this->db->where('id_admin',$id_admin);
			$this->db->delete('akun_admin');
		}

	}

?>