<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');
require (APPPATH.'controllers/api/auth/EmailGateway.php');

use Restserver\Libraries\REST_Controller_Definitions;

class Login extends REST_Controller {

    private $userModel;
    private $responseBuilder;
    private $emailGateway;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new M_register();
        $this->responseBuilder = new ResponseBuilder();
        $this->emailGateway = new EmailGateway();
    }

    function index_post() {
        $userData = $this->post();
        $findPhoneNumber = $this->userModel->check_phone_number($userData['no_telp']);
        if($findPhoneNumber) {

            $userData['otp'] = $this->emailGateway->generateRandomNumber();
            $updateOtp = $this->userModel->update_user_otp($userData['no_telp'], $userData['otp']);
            $selectedUser["selected_user"] = $this->userModel->getUserByPhoneNumber($userData['no_telp']);

            if($updateOtp) {
                foreach ($selectedUser["selected_user"] as $user) {
                    $this->emailGateway->sendEmailOtp($user->email, $userData['otp']);
                }
                $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, true, "Nomor ponsel ditemukan");
            }

        } else {
            $response = $this->responseBuilder->build(REST_Controller::HTTP_OK, false, "Nomor ponsel tidak terdaftar");
        }
        $this->response($response);
    }


}