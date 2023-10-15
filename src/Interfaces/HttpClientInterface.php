<?php

namespace UserBridge\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{
    public function request(string $method, string $uri, array $options = []): ?ResponseInterface;
}
