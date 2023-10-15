<?php

namespace UserBridge\Services;

use UserBridge\Interfaces\UserSerialiserInterface;
use UserBridge\Models\User;

class UserSerialiser implements UserSerialiserInterface
{
    public function toArray(User $user): array
    {
        return [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'avatar' => $user->getAvatar(),
        ];
    }

    public function toJson(User $user): string
    {
        return json_encode($this->toArray($user));
    }
}