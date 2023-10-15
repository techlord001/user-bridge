<?php

namespace UserBridge\Services;

use UserBridge\Interfaces\HttpClientInterface;
use UserBridge\Interfaces\ListUsersRetrieverInterface;
use UserBridge\Models\Pagination;
use UserBridge\Models\User;
use UserBridge\Models\Users;

class ListUsersRetriever implements ListUsersRetrieverInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getPaginatedUsers(int $page = 1): Users
    {
        $response = $this->client->request('GET', '/api/users?page=' . $page);

        $data = json_decode($response->getBody(), true);

        $users = array_map(function ($userData) {
            return new User(
                $userData['id'],
                $userData['email'],
                $userData['first_name'],
                $userData['last_name'],
                $userData['avatar']
            );
        }, $data['data']);

        $pagination = new Pagination(
            $data['page'],
            $data['per_page'],
            $data['total'],
            $data['total_pages']
        );

        return new Users(
            $users,
            $pagination
        );
    }
}