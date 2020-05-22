<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');
require (APPPATH.'controllers/api/auth/Smsgateway.php');

use Restserver\Libraries\REST_Controller_Definitions;

class Login extends REST_Controller {

    private $userModel;
    private $responseBuilder;
    private $smsGateway;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new M_register();
        $this->responseBuilder = new ResponseBuilder();
        $this->smsGateway = new Smsgateway();
    }

    function index_post() {
        $userData = $this->post();
        $findPhoneNumber = $this->userModel->check_phone_number($userData['no_telp']);
        if($findPhoneNumber) {

            $userData['otp'] = $this->smsGateway->generateRandomNumber();
            $updateOtp = $this->userModel->update_user_otp($userData['no_telp'], $userData['otp']);

            if($updateOtp) {
                $this->smsGateway->sendOTP($userData['no_telp'], $userData['otp']);
                $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, true, "Nomor ponsel ditemukan");
            }

        } else {
            $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, "Nomor ponsel tidak terdaftar");
        }
        $this->response($response);
    }


}