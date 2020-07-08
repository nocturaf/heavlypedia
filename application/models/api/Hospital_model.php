<?php

class Hospital_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function getNearestHospital($km = 5, $origLat, $origLon)
    {
        $dist = $km * 0.621371;
        return $this->db->query("
            SELECT id_admin, nama_admin, alamat, no_telp, email, latitude, longtitude, SQRT(
                POW(69.1 * (latitude - $origLat), 2) +
                POW(69.1 * ($origLon - longtitude) * COS(latitude / 57.3), 2)) AS distance
            FROM akun_admin HAVING distance < $dist ORDER BY distance;
        ")->result_array();
    }

    function getAllSpeciality()
    {
        return $this->db->get('poli')->result_array();
    }

    function getListDoctor($hospitalId, $poli, $availableDay)
    {
        $this->db->where('id_admin', $hospitalId);
        $this->db->where('poli', $poli);
        $this->db->where('hari_praktek', $availableDay);
        return $this->db->get('jadwal_dokter')->result_array();
    }

    function getPoli()
    {
        $query = $this->db->get('poli');
        if($query) {
            return $query->result_array();
        }
    }

}