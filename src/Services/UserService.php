<?php

namespace UserBridge\Services;

use UserBridge\Interfaces\ListUsersRetrieverInterface;
use UserBridge\Interfaces\SingleUserRetrieverInterface;
use UserBridge\Interfaces\UserCreatorInterface;
use UserBridge\Models\User;
use UserBridge\Models\Users;

class UserService
{
    private ListUsersRetrieverInterface $listUsersRetriever;
    private SingleUserRetrieverInterface $singleUserRetriever;
    private UserCreatorInterface $userCreator;

    public function __construct(
        ListUsersRetrieverInterface $listUsersRetriever,
        SingleUserRetrieverInterface $singleUserRetriever,
        UserCreatorInterface $userCreator
    ) {
        $this->listUsersRetriever = $listUsersRetriever;
        $this->singleUserRetriever = $singleUserRetriever;
        $this->userCreator = $userCreator;
    }

    public function getUserById(int $id): User
    {
        return $this->singleUserRetriever->getUserById($id);
    }

    public function getPaginatedUsers(int $page = 1): Users
    {
        return $this->listUsersRetriever->getPaginatedUsers($page);
    }

    public function createUser(string $name, string $job): int
    {
        return $this->userCreator->createUser($name, $job);
    }
}
