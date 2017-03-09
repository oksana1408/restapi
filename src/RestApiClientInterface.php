<?php
interface RestApiClientInterface
{
    public function getClient();

    public function sendRequest($httpMethod, $endPoint, $data = null);
}