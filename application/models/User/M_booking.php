<?php
	class M_booking extends CI_Model
	{
		function get_data_akun($id_pasien) {
			$this->db->where('id_pasien',$id_pasien);
            return $this->db->get('akun_pasien')->result_array();
		}

		function get_data_poli() {
            $query = $this->db->query("SELECT * FROM poli ORDER BY nama_poli ASC");
            return $query->result_array();
		}

		function get_hasil($latitude,$longtitude) {
			$data = $this->db->query("SELECT id_admin,nama_admin,alamat,no_telp,
		    ( 6371 * acos( cos( radians(?) ) * cos( radians(latitude) ) * cos( radians(?) - radians(longtitude) )
		    + sin( radians(?) ) * sin( radians(latitude) ) ) ) AS distance
		    FROM akun_admin ORDER BY distance ASC", array($latitude,$longtitude,$latitude));
    		
    		return $data->result_array();
		}

		function cari_koordinat($id_admin) {
			$data = $this->db->query("SELECT latitude, longtitude FROM akun_admin WHERE id_admin = '$id_admin'");
    		return $data->result_array();
		}

		function cari_tersedia($id_admin,$poli,$hari,$jam) {
			$data = $this->db->query("SELECT id_jadwal,id_dokter,id_admin,nama_dokter,kuota FROM jadwal_dokter WHERE id_admin = '$id_admin' AND poli = '$poli' AND hari_praktek = '$hari' AND mulai_praktek <= '$jam' AND selesai_praktek >= '$jam'");
    		return $data->result_array();
		}

		function book_now($data){
			return $this->db->insert("booking", $data);
		}

		function cek_kuota_dokter($id_admin,$id_dokter) {
			$data = $this->db->query("SELECT kuota FROM jadwal_dokter WHERE id_admin = '$id_admin' AND id_dokter = '$id_dokter'");
    		return $data->result_array()[0];
		}

		function cek_jum_kuota($id_admin,$id_dokter,$tgl_booking) {
			$data = $this->db->query("SELECT * FROM booking WHERE id_admin = '$id_admin' AND id_dokter = '$id_dokter' AND tgl_booking = '$tgl_booking'");
    		return $data->result_array();
		}

	}

?>