<?php
	class M_admin_list_booking extends CI_Model
	{
		function get_data_list($id_admin) {
			$this->db->where('id_admin',$id_admin);
			$this->db->order_by("id_booking", "desc");
            return $this->db->get('booking')->result_array();
		}

		function konfirmasi_booking($data,$id_booking){
			$this->db->where('id_booking', $id_booking);
			$this->db->update('booking', $data);
		}

		function update_status($data,$id_booking){
			$this->db->where('id_booking', $id_booking);
			$this->db->update('booking', $data);
		}

		function search_data($id_admin,$search) {
			$data = $this->db->query("SELECT * FROM booking WHERE id_admin = '$id_admin' AND (nama_pasien LIKE '%$search%' OR id_booking LIKE '%$search%') ");
    		return $data->result_array();
		}

	}

?>