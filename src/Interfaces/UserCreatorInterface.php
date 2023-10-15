<?php

namespace UserBridge\Interfaces;

interface UserCreatorInterface
{
    public function createUser(string $name, string $job): int;
}