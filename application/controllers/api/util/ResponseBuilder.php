<?php

class ResponseBuilder {

    public function build($httpCode, $status, $message) {
        return array(
            "status"  => $status,
            "code"    => $httpCode,
            "message" => $message
        );
    }

    public function buildWithData($httpCode, $status, $data) {
        return $response = array(
            "status" => $status,
            "code"   => $httpCode,
            "data"   => $data
        );
    }

}