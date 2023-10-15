<?php
// Require the autoload file to load all the dependencies
require_once __DIR__ . '/vendor/autoload.php';

// Require the UserService DI container configuration file to get the dependencies
$container = require __DIR__ . '/src/Config/config.php';

// Get the UserService from the container
$userService = $container->get(UserBridge\Services\UserService::class);

// Get a user by ID
$user = $userService->getUserById(1);

// Get a paginated list of users
$users = $userService->getPaginatedUsers(2);

// Create a new user and get the ID of the created user
$createdUserId = $userService->createUser('John Doe', 'Developer');

// Print the first name of the user
echo $user->getFirstName() . PHP_EOL;

// Print the first name of each user in the paginated list
foreach ($users as $user) {
    echo $user->getFirstName() . PHP_EOL;
}

// Print the ID of the created user
echo $createdUserId . PHP_EOL;

// Print the first name of the user in an array format
echo $userService->serialiseUserToArray($user)['first_name'] . PHP_EOL;

// Print the user in a JSON format
echo $userService->serialiseUserToJson($user) . PHP_EOL;