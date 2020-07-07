<?php

class Booking_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function getAllBookingByUserId($userId) {
        $this->db->where('id_pasien', $userId);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('booking');
        if($query) {
            return $query->result_array();
        }
    }

    function getAllConfirmedBookingByUserId($userId) {
        $this->db->where('id_pasien', $userId);
        $this->db->where('status', "Dikonfirmasi");
        $query = $this->db->get('booking');
        if($query) {
            return $query->result_array();
        }
    }

}
