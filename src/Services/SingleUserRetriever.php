<?php

namespace UserBridge\Services;

use UserBridge\Interfaces\HttpClientInterface;
use UserBridge\Interfaces\SingleUserRetrieverInterface;
use UserBridge\Models\User;

class SingleUserRetriever implements SingleUserRetrieverInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getUserById(int $id): User
    {
        $response = $this->client->request('GET', '/api/users/' . $id);

        $data = json_decode($response->getBody()->getContents(), true)['data'];

        return new User(
            $data['id'],
            $data['email'],
            $data['first_name'],
            $data['last_name'],
            $data['avatar']
        );
    }
}