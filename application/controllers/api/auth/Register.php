<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');
require (APPPATH.'controllers/api/auth/EmailGateway.php');

use Restserver\Libraries\REST_Controller_Definitions;

class Register extends REST_Controller {

    private $registerModel;
    private $responseBuilder;
    private $emailGateway;

    public function __construct()
    {
        parent::__construct();
        $this->registerModel = new M_register();
        $this->responseBuilder = new ResponseBuilder();
        $this->emailGateway = new EmailGateway();
    }

    function index_post() {
        $userData = $this->post();
        $userData['otp'] = $this->emailGateway->generateRandomNumber();

        $validateDuplication = $this->registerModel->validate_user_duplication($userData);
        if($validateDuplication == "phone") {
            $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, "Nomor telepon sudah terdaftar");
            $this->response($response);
        }
        if($validateDuplication == "email") {
            $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, "Email sudah terdaftar");
            $this->response($response);
        }
        if($validateDuplication == "username") {
            $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, "Username sudah terdaftar");
            $this->response($response);
        }
        if($validateDuplication == "ok") {
            $saveData = $this->registerModel->add_account($userData);
            if($saveData) {
                // send email otp code
                $email = $this->emailGateway->sendEmailOtp($userData['email'], $userData['otp']);
                if($email) {
                    $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, true, "Akun Berhasil Dibuat");
                } else {
                    $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, $email);
                }
            } else {
                $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, "Gagal registrasi");
            }
            $this->response($response);
        }
    }


}