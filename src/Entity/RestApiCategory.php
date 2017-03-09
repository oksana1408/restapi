<?php
class RestApiCategory {

    public static function getById($id) {
        $client = RestApiClient::getInstance();
        $data = $client->sendRequest('GET', 'http://catalog.loc/api/rest/category/view/' . $id);
        return $data;
    }

    public static function getList() {
        $client = RestApiClient::getInstance();
        $data = $client->sendRequest('GET', 'http://catalog.loc/api/rest/category/list');
        return $data;
    }

    public static function create($categoryDataJson) {
        $client = RestApiClient::getInstance();
        $data = $client->sendRequest('POST', 'http://catalog.loc/api/rest/category/create', ['json' => json_encode($categoryDataJson)]);
        return $data;
    }
}