<?php

require (FCPATH.'smsgateway/autoload.php';);

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\ApiException;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

/**
 * SMS Gateway API KEY
 */
define("SMS_GATEWAY_API_KEY", "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4NTE0NjE3MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc4NzYxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.5XZP6QdKwmW_GXV2IKBA5_nxVV4BF50I13MWhWkIXVY");

class Smsgateway {

    private $config;
    private $apiClient;
    private $messageClient;

    function __construct()
    {
        $this->config = Configuration::getDefaultConfiguration();
        $this->config->setApiKey('Authorization', SMS_GATEWAY_API_KEY);
        $this->apiClient = new ApiClient($this->config);
        $this->messageClient = new MessageApi($this->apiClient);
    }

    function sendOTP($phoneNumber, $otpCode) {
        $ptn = "/^0/";  // Regex
        $rpltxt = "+62";  // Replacement string
        $phoneNumber = preg_replace($ptn, $rpltxt, $phoneNumber);
        $message = 'Halo dari HEAVLYPEDIA, ini kode rahasia kamu '.$otpCode.'';
        $messageConfig = new SendMessageRequest(array(
            'phoneNumber' => $phoneNumber,
            'message'     => $message,
            'deviceId'    => 116634
        ));
        try {
            return $this->messageClient->sendMessages(array($messageConfig));
        } catch (ApiException $e) {
            return $e->getMessage();
        }
    }

    function generateRandomNumber() {
        return rand(1000, 10000);
    }

}