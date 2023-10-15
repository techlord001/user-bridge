<?php

namespace UserBridge\Config;

use DI\ContainerBuilder;
use UserBridge\Http\GuzzleHttpClient;
use UserBridge\Interfaces\HttpClientInterface;
use UserBridge\Interfaces\ListUsersRetrieverInterface;
use UserBridge\Interfaces\SingleUserRetrieverInterface;
use UserBridge\Interfaces\UserCreatorInterface;
use UserBridge\Interfaces\UserSerialiserInterface;
use UserBridge\Services\ListUsersRetriever;
use UserBridge\Services\SingleUserRetriever;
use UserBridge\Services\UserCreator;
use UserBridge\Services\UserSerialiser;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    HttpClientInterface::class => \DI\create(GuzzleHttpClient::class),
    ListUsersRetrieverInterface::class => \DI\create(ListUsersRetriever::class)
        ->constructor(\DI\get(HttpClientInterface::class)),
    SingleUserRetrieverInterface::class => \DI\create(SingleUserRetriever::class)
        ->constructor(\DI\get(HttpClientInterface::class)),
    UserCreatorInterface::class => \DI\create(UserCreator::class)
        ->constructor(\DI\get(HttpClientInterface::class)),
    UserSerialiserInterface::class => \DI\create(UserSerialiser::class)
]);

return $containerBuilder->build();