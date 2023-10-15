# UserBridge Library

UserBridge is a PHP library that provides a streamlined interface for interacting with user data from [ReqRes](https://reqres.in/). It encapsulates a set of classes and methods to retrieve, create, and serialize user data, offering a simplified and efficient way to interact with the ReqRes API.

## Installation

Clone the repository and navigate to the project directory. Install the dependencies using Composer:

```bash
composer install
```

## Running Tests

Execute the PHPUnit tests to ensure the library's functionality:

```bash
./vendor/bin/phpunit tests
```

Replace `tests` with the path to your test files if they are located elsewhere.

## Usage

### Building the Project

The library is structured around core classes that facilitate interaction with the ReqRes API. The `UserService` class is central, offering methods to retrieve, create, and serialize users.

### Using the `UserService` Class

The `index.php` file included in the library provides a demonstration of how to use the `UserService` class. You can run it using the following command:

```bash
php index.php
```

This will execute a series of operations, including retrieving a user by ID, fetching a paginated list of users, creating a new user, and serializing user data.

Here is a basic example of how to use the `UserService` class:

```php
// Get the UserService from the DI container
$userService = $container->get(UserBridge\Services\UserService::class);

// Retrieve a user by ID
$user = $userService->getUserById(1);

// Retrieve a paginated list of users
$users = $userService->getPaginatedUsers(2);

// Create a new user
$createdUserId = $userService->createUser('John Doe', 'Developer');

// Serialize a user to an array
$array = $userService->serialiseUserToArray($user);

// Serialize a user to JSON
$json = $userService->serialiseUserToJson($user);
```

### Available Methods in `UserService`

- `getUserById(int $id): User`: Retrieve a user by their ID.
- `getPaginatedUsers(int $page = 1): Users`: Fetch a paginated list of users.
- `createUser(string $name, string $job): int`: Create a new user and return their ID.
- `serialiseUserToArray(User $user): array`: Serialize a user object to an array.
- `serialiseUserToJson(User $user): string`: Serialize a user object to a JSON string.

### Explanation of Core Classes

- `UserService`: This is the main service class that provides methods to interact with the user data. It depends on the `ListUsersRetriever`, `SingleUserRetriever`, `UserCreator`, and `UserSerialiser` classes to perform various operations.

- `ListUsersRetriever`: Retrieves a paginated list of users from the ReqRes API.

- `SingleUserRetriever`: Retrieves a single user by their ID from the ReqRes API.

- `UserCreator`: Creates a new user on the ReqRes platform and returns the ID of the newly created user.

- `UserSerialiser`: Converts a User object into an array or JSON format for easy handling and response formatting.

### Connecting to ReqRes API

This library is configured to connect to the [ReqRes API](https://reqres.in/) by default. It provides a mock API for testing and development purposes, offering a collection of endpoints that simulate real-world API behavior.