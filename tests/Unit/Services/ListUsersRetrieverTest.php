<?php

namespace Tests\Unit\Services;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use UserBridge\Http\GuzzleHttpClient;
use UserBridge\Models\Users;
use UserBridge\Services\ListUsersRetriever;

class ListUsersRetrieverTest extends TestCase
{
    public function testGetPaginatedUsers()
    {
        $page = 1;
        $perPage = 6;
        $totalUsers = 12;
        $totalPages = 2;

        $client = new GuzzleHttpClient();
        $usersList = new ListUsersRetriever($client);
        $users = $usersList->getPaginatedUsers($page);

        $this->assertInstanceOf(Users::class, $users);
        $this->assertEquals($page, $users->getPagination()->getCurrentPage());
        $this->assertEquals($perPage, $users->getPagination()->getPerPage());
        $this->assertEquals($totalUsers, $users->getPagination()->getTotalUsers());
        $this->assertEquals($totalPages, $users->getPagination()->getTotalPages());
        $this->assertTrue($users->getPagination()->hasNextPage());
    }
}