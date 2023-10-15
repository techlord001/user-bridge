<?php

namespace UserBridge\Interfaces;

use UserBridge\Models\User;

interface SingleUserRetrieverInterface
{
    public function getUserById(int $id): User;
}