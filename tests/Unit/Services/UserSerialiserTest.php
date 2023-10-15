<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use UserBridge\Models\User;
use UserBridge\Services\UserSerialiser;

class UserSerialiserTest extends TestCase
{
    private UserSerialiser $serialiser;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $user = $this->createMock(User::class);
        $user->method('getId')->willReturn(1);
        $user->method('getEmail')->willReturn('test@example.com');
        $user->method('getFirstName')->willReturn('John');
        $user->method('getLastName')->willReturn('Doe');
        $user->method('getAvatar')->willReturn('avatar.jpg');

        $this->user = $user;
        $this->serialiser = new UserSerialiser();
    }

    public function testToArrayReturnsArray(): void
    {
        $result = $this->serialiser->toArray($this->user);

        $this->assertIsArray($result);
        $this->assertEquals([
            'id' => 1,
            'email' => 'test@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'avatar' => 'avatar.jpg',
        ], $result);
    }

    public function testToJsonReturnsJsonString(): void
    {
        $result = $this->serialiser->toJson($this->user);

        $this->assertIsString($result);
        $this->assertEquals(json_encode([
            'id' => 1,
            'email' => 'test@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'avatar' => 'avatar.jpg',
        ]), $result);
    }
}