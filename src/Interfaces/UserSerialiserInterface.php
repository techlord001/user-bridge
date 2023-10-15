<?php

namespace UserBridge\Interfaces;

use UserBridge\Models\User;

interface UserSerialiserInterface
{
    public function toArray(User $user): array;
    public function toJson(User $user): string;
}