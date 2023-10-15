<?php

namespace UserBridge\Models;

class User
{
    private int $id;
    private string $email;
    private string $firstName;
    private string $lastName;
    private string $avatar;

    public function __construct(
        int $id,
        string $email,
        string $firstName,
        string $lastName,
        string $avatar
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->avatar = $avatar;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }
}