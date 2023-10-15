<?php

namespace Tests\Integration\Services;

use PHPUnit\Framework\TestCase;
use UserBridge\Http\GuzzleHttpClient;
use UserBridge\Models\User;
use UserBridge\Models\Users;
use UserBridge\Services\ListUsersRetriever;
use UserBridge\Services\SingleUserRetriever;
use UserBridge\Services\UserCreator;
use UserBridge\Services\UserSerialiser;
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
        $userSeralier = new UserSerialiser();

        $this->userService = new UserService($listUsersRetriever, $singleUserRetriever, $userCreator, $userSeralier);
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

    public function testSeraliseToArray(): void
    {
        $user = $this->userService->getUserById(2);
        $result = $this->userService->serialiseUserToArray($user);

        $this->assertIsArray($result);
        $this->assertEquals([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'avatar' => $user->getAvatar(),
        ], $result);
    }

    public function testSeraliseToJson(): void
    {
        $user = $this->userService->getUserById(2);
        $result = $this->userService->serialiseUserToJson($user);

        $this->assertIsString($result);
        $this->assertEquals(json_encode([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'avatar' => $user->getAvatar(),
        ]), $result);
    }
}