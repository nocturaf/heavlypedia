<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');

use Restserver\Libraries\REST_Controller_Definitions;

class Verification extends REST_Controller {

    private $registerModel;
    private $responseBuilder;

    public function __construct()
    {
        parent::__construct();
        $this->registerModel = new M_register();
        $this->responseBuilder = new ResponseBuilder();
    }

    function index_post() {
        $userData = $this->post();
        $selectedUserData = $this->registerModel->validate_user_otp($userData['no_telp']);
        if($selectedUserData[0]['otp'] == $userData['otp']) {
            $response = $this->responseBuilder->buildWithData(REST_Controller::HTTP_OK, true, $selectedUserData);
        } else {
            $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, "Verifikasi OTP Gagal");
        }
        $this->response($response);
    }


}