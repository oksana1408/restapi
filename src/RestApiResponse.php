<?php

class RestApiResponse {
    protected $_libResponse;

    public function __construct($response) {
        $this->_libResponse = $response;
    }

    public function getResponse() {
        return $this->_libResponse;
    }

    public function getStatusCode() {
        return $this->getResponse()->getStatusCode();
    }

    public function getContent() {
        return $this->getResponse()->getBody()->getContents();
    }

    public function isSuccessful() {
        return $this->getStatusCode() == 200;
    }
}