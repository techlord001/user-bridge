<?php

namespace Tests\Unit\Models\User;

use PHPUnit\Framework\TestCase;
use UserBridge\Models\User;

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User(
            1,
            'test@example.com',
            'John',
            'Doe',
            'https://example.com/avatar.jpg'
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(1, $this->user->getId());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals('test@example.com', $this->user->getEmail());
    }

    public function testGetFirstName(): void
    {
        $this->assertEquals('John', $this->user->getFirstName());
    }

    public function testGetLastName(): void
    {
        $this->assertEquals('Doe', $this->user->getLastName());
    }

    public function testGetAvatar(): void
    {
        $this->assertEquals('https://example.com/avatar.jpg', $this->user->getAvatar());
    }
}
