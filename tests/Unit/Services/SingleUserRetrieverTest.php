<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use UserBridge\Http\GuzzleHttpClient;
use UserBridge\Models\User;
use UserBridge\Services\SingleUserRetriever;

class SingleUserRetrieverTest extends TestCase
{
    public function testGetUserById(): void
    {
        $userId = 2;
        $userData = [
            'id' => $userId,
            'email' => 'janet.weaver@reqres.in',
            'first_name' => 'Janet',
            'last_name' => 'Weaver',
            'avatar' => 'https://reqres.in/img/faces/2-image.jpg'
        ];

        $client = new GuzzleHttpClient();
        $singleUserRetriever = new SingleUserRetriever($client);

        $user = $singleUserRetriever->getUserById($userId);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($userId, $user->getId());
        $this->assertEquals($userData['email'], $user->getEmail());
        $this->assertEquals($userData['first_name'], $user->getFirstName());
        $this->assertEquals($userData['last_name'], $user->getLastName());
        $this->assertEquals($userData['avatar'], $user->getAvatar());
    }
}