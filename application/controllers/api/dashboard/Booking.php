<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');

use Restserver\Libraries\REST_Controller_Definitions;

class Booking extends REST_Controller {

    private $responseBuilder;
    private $booking;

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->responseBuilder = new ResponseBuilder();
        $this->booking = new Booking_model();
    }

    function index_get() {
        $userId = $this->get('user_id');
        $bookingList = $this->booking->getAllBookingByUserId($userId);
        $response = $this->responseBuilder->buildWithData(Rest_Controller::HTTP_OK, true, $bookingList);
        $this->response($response);
    }

}