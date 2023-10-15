<?php

namespace Tests\Integration\Services;

use PHPUnit\Framework\TestCase;
use UserBridge\Http\GuzzleHttpClient;
use UserBridge\Models\User;
use UserBridge\Models\Users;
use UserBridge\Services\ListUsersRetriever;
use UserBridge\Services\SingleUserRetriever;
use UserBridge\Services\UserCreator;
use UserBridge\Services\UserService;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        $client = new GuzzleHttpClient();

        $listUsersRetriever = new ListUsersRetriever($client);
        $singleUserRetriever = new SingleUserRetriever($client);
        $userCreator = new UserCreator($client);

        $this->userService = new UserService($listUsersRetriever, $singleUserRetriever, $userCreator);
    }

    public function testGetUserById(): void
    {
        $user = $this->userService->getUserById(2); 

        $this->assertInstanceOf(User::class, $user);
        $this->assertIsInt($user->getId());
        $this->assertIsString($user->getEmail());
        $this->assertIsString($user->getFirstName());
        $this->assertIsString($user->getLastName());
        $this->assertIsString($user->getAvatar());
    }

    public function testGetPaginatedUsers(): void
    {
        $users = $this->userService->getPaginatedUsers(1);

        $this->assertInstanceOf(Users::class, $users);
        $this->assertIsInt($users->getPagination()->getCurrentPage());
        $this->assertIsInt($users->getPagination()->getPerPage());
        $this->assertIsInt($users->getPagination()->getTotalUsers());
        $this->assertIsInt($users->getPagination()->getTotalPages());
        $this->assertIsBool($users->getPagination()->hasNextPage());
    }

    public function testCreateUser(): void
    {
        $name = 'John Doe';
        $job = 'Developer';

        $userId = $this->userService->createUser($name, $job);

        $this->assertIsInt($userId);
    }
}