<?php

namespace UserBridge\Services;

use UserBridge\Interfaces\HttpClientInterface;
use UserBridge\Interfaces\UserCreatorInterface;

class UserCreator implements UserCreatorInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function createUser(string $name, string $job): int
    {
        $response = $this->client->request('POST', '/api/users', [
            'name' => $name,
            'job' => $job
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['id'];
    }
}