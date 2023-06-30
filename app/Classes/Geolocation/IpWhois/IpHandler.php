<?php

namespace App\Classes\Geolocation\IpWhois;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class IpHandler
{
    const SOURCE = 'http://ipwhois.app/json/';

    private $ip;
    private $ipInfo;

    public function getCity()
    {
        return $this->fullIpInfo()["city"];
    }

    public function fullIpInfo()
    {
        return $this->request('', [
            'ip' => $this->getIp(),
        ]);
    }

    public function request(string $apiMethod, array $params, string $requestMethod = 'GET')
    {
        $response = "";
        try {
            $options = ($requestMethod === 'GET') ? ['query' => $params] : $params;
            $result = (new Client())->request($requestMethod, self::SOURCE.$apiMethod, $options);
            $response = $result->getBody()->getContents();
        } catch (GuzzleException $e) {
            dump($e->getMessage());
        }

        return json_decode($response, 1);
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     * @return IpHandler
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpInfo()
    {
        return $this->ipInfo;
    }

    /**
     * @param mixed $ipInfo
     * @return IpHandler
     */
    public function setIpInfo($ipInfo)
    {
        $this->ipInfo = $ipInfo;
        return $this;
    }
}
