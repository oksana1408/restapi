<?php

class RestApiClient implements RestApiClientInterface {

    protected $_client;
    protected static $_instance = null;

    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
            self::$_instance->_init();
        }
        return self::$_instance;
    }

    protected function _init() {
        $this->_client = new \GuzzleHttp\Client();
    }

    protected function __clone() {}
    protected function __construct() {}

    public function getClient() {
        return $this->_client;
    }

    public function sendRequest($httpMethod, $endPoint, $data = null) {
        if ($httpMethod == 'GET') {
            $result = $this->getClient()->request($httpMethod, $endPoint);
        } elseif($httpMethod == 'POST')  {
            $request = $this->getClient()->post($endPoint,array(
                'content-type' => 'application/json'
            ),array());
            $request->setBody($data);
            $result = $request->send();
        }

        $response = new RestApiResponse($result);
        if(!$response->isSuccessful()) {
            throw new Exception('Request has failed.');
        }
        return $response->getContent();
    }
}