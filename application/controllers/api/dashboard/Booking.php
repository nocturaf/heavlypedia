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

    function nearest_get() {
        $userId = $this->get('user_id');
        $userCurrentTime = $this->get('user_current_time');
        $bookingList = $this->booking->getAllConfirmedBookingByUserId($userId);
        if(sizeof($bookingList) > 1) {
            $listOfBookingDateTime = array();
            foreach($bookingList as $row) {
                array_push(
                    $listOfBookingDateTime,
                    $this->getStandardDateTime($row['tgl_booking'], $row['jam_booking'])
                );
            }
            $nearestDateTime = $this->findNearestDateFromToday($listOfBookingDateTime, $userCurrentTime);
            if($nearestDateTime != "") {
                $listOfBookingDateTime = array();
                foreach ($bookingList as $row) {
                    if($this->getStandardDateTime($row['tgl_booking'], $row['jam_booking']) == $nearestDateTime) {
                        array_push($listOfBookingDateTime, $row);
                    }
                }
                $response = $this->responseBuilder->buildWithData(Rest_Controller::HTTP_OK, true, $listOfBookingDateTime);
                $this->response($response);
            }
        } else {
            $response = $this->responseBuilder->buildWithData(Rest_Controller::HTTP_OK, true, $bookingList);
            $this->response($response);
        }
    }

    function getStandardDateTime($indonesianDate, $time) {
        $bookingDateRaw = explode(", ", $indonesianDate);
        $actualDate = $bookingDateRaw[1];
        return date('Y-m-d', strtotime($actualDate))." ".$time;
    }

    function findNearestDateFromToday($listOfBookingSchedule, $userCurrentDateTime) {
        // compare date time
        foreach($listOfBookingSchedule as $booking) {
            $interval[] = abs(strtotime($userCurrentDateTime) - strtotime($booking));
        }
        asort($interval);
        $closest = key($interval);
        $nearestDateTime = $listOfBookingSchedule[$closest];
        if($nearestDateTime != "") {
            return $nearestDateTime;
        }
        return "";
    }

}