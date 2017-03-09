<?php
class RestApiProduct {

    public static function getById($id) {
        $client = RestApiClient::getInstance();
        $data = $client->sendRequest('GET', 'http://catalog.loc/api/rest/product/view/' . $id);
        return $data;
    }

    public static function getList() {
        $client = RestApiClient::getInstance();
        $data = $client->sendRequest('GET', 'http://catalog.loc/api/rest/product/list');
        return $data;
    }

    public static function create($productDataJson) {
        $client = RestApiClient::getInstance();
        $data = $client->sendRequest('POST', 'http://catalog.loc/api/rest/product/create', ['json' => json_encode($productDataJson)]);
        return $data;
    }
}