<?php

namespace UserBridge\Services;

use UserBridge\Interfaces\ListUsersRetrieverInterface;
use UserBridge\Interfaces\SingleUserRetrieverInterface;
use UserBridge\Interfaces\UserCreatorInterface;
use UserBridge\Interfaces\UserSerialiserInterface;
use UserBridge\Models\User;
use UserBridge\Models\Users;

class UserService
{
    private ListUsersRetrieverInterface $listUsersRetriever;
    private SingleUserRetrieverInterface $singleUserRetriever;
    private UserCreatorInterface $userCreator;
    private UserSerialiserInterface $userSerialiser;

    public function __construct(
        ListUsersRetrieverInterface $listUsersRetriever,
        SingleUserRetrieverInterface $singleUserRetriever,
        UserCreatorInterface $userCreator,
        UserSerialiserInterface $userSerialiser
    ) {
        $this->listUsersRetriever = $listUsersRetriever;
        $this->singleUserRetriever = $singleUserRetriever;
        $this->userCreator = $userCreator;
        $this->userSerialiser = $userSerialiser;
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

    public function serialiseUserToArray(User $user): array
    {
        return $this->userSerialiser->toArray($user);
    }

    public function serialiseUserToJson(User $user): string
    {
        return $this->userSerialiser->toJson($user);
    }
}
