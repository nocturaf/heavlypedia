<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');

use Restserver\Libraries\REST_Controller_Definitions;

class Doctor extends REST_Controller {

    private $doctor;
    private $responseBuilder;

    public function __construct()
    {
        parent::__construct();
        $this->doctor = new M_booking();
        $this->responseBuilder = new ResponseBuilder();
    }

    function booking_post()
    {
        $booking = $this->post();
        $booking['id_booking'] = uniqid();
        $booking['status'] = "Menunggu Konfirmasi";
        $save_data = $this->doctor->book_now_distinct($booking);
        if($save_data != null) {
            if($save_data) {
                $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, true, "Janji berhasil dibuat");
            } else {
                $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, $save_data);
            }
        } else {
            $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, "Gagal, jadwal yang sama ditemukan");
        }
        $this->response($response);
    }


}