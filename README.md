## HttpClientInterface

This interface defines the standard structure for making HTTP requests within our application. Any class that implements this interface is guaranteed to have a `request` method, ensuring consistency and predictability in how HTTP requests are made.

### Method

- `request(string $method, string $uri, array $options = []): ?ResponseInterface`

This method is designed to make an HTTP request based on the provided method, URI, and options and return a response or null if an error occurs.


## GuzzleHttpClient

This class is a concrete implementation of the `HttpClientInterface`, utilizing the popular Guzzle HTTP client to make requests. It's configured with a base URI and a timeout to ensure that all requests are directed to the correct endpoint and are time-bound to avoid long waiting times.

### Error Handling

In the event of an error during the HTTP request, a `RequestException` is caught. The error message is logged for debugging purposes, and a user-friendly error message is displayed. The `request` method then returns null to indicate the failure of the HTTP request.

---

### User Class Overview

The `User` class in the UserBridge application acts as a Data Transfer Object (DTO) that encapsulates user data. It is structured with private properties including the user's ID, email, first name, last name, and avatar URL, ensuring data integrity. This class is immutable, meaning once a `User` object is created, its data cannot be modified, ensuring consistency and reliability in handling user information.

Users of the application can create a `User` object by providing the necessary data to the constructor and then retrieve this data via the class's public methods. This encapsulation and accessibility make the `User` class a pivotal component for data handling, ensuring that user data is both secure and easily retrievable throughout the UserBridge application.

---

Certainly! Here's a concise explanation for your `README`:

---

### SingleUserRetriever Class

The `SingleUserRetriever` class is a service responsible for fetching individual user data from an external API. It implements the `SingleUserRetrieverInterface`, ensuring adherence to a defined contract for retrieving user data. The class is dependent on an HTTP client, specified by the `HttpClientInterface`, to make requests to the external API.

When the `getUserById` method is called with a user ID as its parameter, `SingleUserRetriever` utilizes the HTTP client to send a GET request to the API. It then processes the API's response, extracting the user data and returning it as a `User` model instance. This encapsulation of the user retrieval process ensures that the class is easy to use, test, and maintain, promoting clean and efficient code organization.

---