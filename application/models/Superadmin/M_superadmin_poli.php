<?php
	class M_superadmin_poli extends CI_Model
	{
		function get_data_list() {
			$this->db->order_by("nama_poli", "ASC");
            return $this->db->get('poli')->result_array();
		}

		function list_username(){
			$data = $this->db->query("SELECT username FROM akun_admin");
    		return $data->result_array();
		}

		function add_poli($data){
			$this->db->insert("poli", $data);
		}

		function get_data_poli($id_poli) {
			$this->db->where('id_poli',$id_poli);
            return $this->db->get('poli')->result_array();
		}

		function edit_poli($data,$id_poli){
			$this->db->where('id_poli', $id_poli);
			$this->db->update("poli", $data);
		}

		function delete_all_data_poli_booking($poli)
		{
			$this->db->where('poli',$poli);
			$this->db->delete('booking');
		}

		function delete_all_data_poli_jadwal_dokter($poli)
		{
			$this->db->where('poli',$poli);
			$this->db->delete('jadwal_dokter');
		}

		function delete_all_data_poli($id_poli)
		{
			$this->db->where('id_poli',$id_poli);
			$this->db->delete('poli');
		}

	}

?>