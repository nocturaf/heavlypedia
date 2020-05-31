<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');
require (APPPATH.'controllers/api/auth/Smsgateway.php');

use Restserver\Libraries\REST_Controller_Definitions;

class Register extends REST_Controller {

    private $registerModel;
    private $responseBuilder;
    private $smsGateway;

    public function __construct()
    {
        parent::__construct();
        $this->registerModel = new M_register();
        $this->responseBuilder = new ResponseBuilder();
        $this->smsGateway = new Smsgateway();
    }

    function index_post() {
        $userData = $this->post();
        $userData['otp'] = $this->smsGateway->generateRandomNumber();
        $saveData = $this->registerModel->add_account($userData);
        if($saveData) {

            // send sms otp code
            //$this->smsGateway->sendOTP($userData['no_telp'], $userData['otp']);

            $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, true, "Akun berhasil dibuat");
            $this->response($response);
        } else {
            $response = $saveData;
        }
        $this->response($response);
    }


}