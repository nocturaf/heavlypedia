<?php
	class M_superadmin_login extends CI_Model
	{
		function getAccount($data_account) {
			$query = $this->db->get_where('akun_superadmin', $data_account);
			if ($query->num_rows() != 0) {
				return $query->row();
			} else {
				return array();
			}
		}

	}

?>