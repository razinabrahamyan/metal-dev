<?php

namespace App\Classes\Geolocation\Sputnik;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Api
{
    const SOURCE = 'http://search.maps.sputnik.ru/';

    /**
     * Метод возвращает координаты относительно переданного адреса
     * @param string $address
     * @return array
     */
    public function getCoordinatesFromAddress(string $address) : array
    {
        $response = $this->request('search/addr', [
            "q" => $address,
        ]);

        $coordinates = $response['result']['address'][0]['features'][0]['geometry']['geometries'][0]['coordinates'] ?? '';

        return [
            "longitude" => $coordinates[0] ?? null, //Долгота
            "latitude"  => $coordinates[1] ?? null, //Широта
        ];
    }

    /**
     * Базовый запрос для API
     * @param string $apiMethod
     * @param array $params
     * @param string $requestMethod
     * @return mixed
     */
    public function request(string $apiMethod, array $params, string $requestMethod = 'GET')
    {
        $response = "";
        try {
            $options = ($requestMethod === 'GET') ? ['query' => $params] : $params;
            $result = (new Client())->request($requestMethod, self::SOURCE.$apiMethod, $options);
            $response = $result->getBody()->getContents();
        } catch (GuzzleException $e) {
           dump( $e->getMessage());
        }

        return json_decode($response, 1);
    }
}
