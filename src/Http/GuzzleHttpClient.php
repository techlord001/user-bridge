<?php

namespace UserBridge\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use UserBridge\Interfaces\HttpClientInterface;

class GuzzleHttpClient implements HttpClientInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://reqres.in/',
            'timeout' => 2.0,
        ]);
    }

    public function request(string $method, string $uri, array $options = []): ?ResponseInterface
    {
        try {
            return $this->client->request($method, $uri, $options);
        } catch (RequestException $e) {
            error_log($e->getMessage());
            echo "An error occurred during the request - Code: " . $e->getCode() . $e->getMessage();
            return null;
        }
    }
}
