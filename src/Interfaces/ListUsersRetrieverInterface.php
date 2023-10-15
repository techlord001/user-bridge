<?php

namespace UserBridge\Interfaces;

use UserBridge\Models\Users;

interface ListUsersRetrieverInterface
{
    public function getPaginatedUsers(int $page = 1): Users;
}