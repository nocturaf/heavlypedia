<?php

class Booking_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function getAllBookingByUserId($userId) {
        $this->db->where('id_pasien', $userId);
        $query = $this->db->get('booking');
        if($query) {
            return $query->result_array();
        }
    }

}
