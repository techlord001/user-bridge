<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use UserBridge\Http\GuzzleHttpClient;
use UserBridge\Services\UserCreator;

class UserCreatorTest extends TestCase
{
    public function testCreateUser()
    {
        $name = 'John Doe';
        $job = 'Developer';

        $client = new GuzzleHttpClient();
        $userCreator = new UserCreator($client);

        $userId = $userCreator->createUser($name, $job);
        $this->assertIsInt($userId);
    }
}