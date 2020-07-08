<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');
//require (APPPATH.'controllers/api/auth/Smsgateway.php');

use Restserver\Libraries\REST_Controller_Definitions;

class Hospital extends REST_Controller {

    private $hospital;
    private $responseBuilder;

    public function __construct()
    {
        parent::__construct();
        $this->hospital = new Hospital_model();
        $this->responseBuilder = new ResponseBuilder();
    }

    function index_get()
    {
        $locationRadius = $this->get('km');
        $userlat = $this->get('user_lat');
        $userlong = $this->get('user_lng');

        $hospitals = $this->hospital->getNearestHospital($locationRadius, $userlat, $userlong);
        $this->response($this->responseBuilder->buildWithData(Rest_controller::HTTP_OK, true, $hospitals));
    }

    function speciality_get()
    {
        $specialities = $this->hospital->getAllSpeciality();
        $this->response(
            $this->responseBuilder->buildWithData(REST_Controller::HTTP_OK, true, $specialities)
        );
    }

    function doctor_get()
    {
        $hospitalId = $this->get('hospital_id');
        $poli = $this->get('poli');
        $availableDay = $this->get('day');
        $doctors = $this->hospital->getListDoctor($hospitalId, $poli, $availableDay);
        $this->response(
            $this->responseBuilder->buildWithData(REST_Controller::HTTP_OK, true, $doctors)
        );
    }

    function poli_get()
    {
        $poliList = $this->hospital->getPoli();
        $response = $this->responseBuilder->buildWithData(REST_Controller::HTTP_OK, true, $poliList);
        $this->response($response);
    }


}