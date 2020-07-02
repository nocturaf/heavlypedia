<?php

require (APPPATH.'/libraries/REST_Controller.php');
require (APPPATH.'controllers/api/util/ResponseBuilder.php');

use Restserver\Libraries\REST_Controller_Definitions;

define("FCM_API_KEY", getenv("FCM_API_KEY"));

class Notification extends REST_Controller {

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function booking_post($to, $data)
    {
        $fields = array(
            'to' => $to,
            'notification' => $data
        );
        $headers = array(
            'Authorization: key='.FCM_API_KEY, 'Content-Type: application/json'
        );
        $url = 'https://fcm.googleapis.com/fcm/send';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        $this->response(
            json_decode($result, true)
        );
    }

}