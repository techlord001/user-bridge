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

### SingleUserRetriever Class

The `SingleUserRetriever` class is a service responsible for fetching individual user data from an external API. It implements the `SingleUserRetrieverInterface`, ensuring adherence to a defined contract for retrieving user data. The class is dependent on an HTTP client, specified by the `HttpClientInterface`, to make requests to the external API.

When the `getUserById` method is called with a user ID as its parameter, `SingleUserRetriever` utilizes the HTTP client to send a GET request to the API. It then processes the API's response, extracting the user data and returning it as a `User` model instance. 

---

### Users Model

The `Users` model is a collection class designed to hold and manage an array of `User` objects. It implements the `IteratorAggregate` interface, allowing easy iteration over the contained `User` objects. The class also holds an instance of the `Pagination` model, which provides pagination details for the user data. The `getIterator` method enables the iteration, while the `getPagination` method allows access to the pagination information, ensuring a clean and efficient way to handle and access user data and their respective pagination details.

### Pagination Model

The `Pagination` model encapsulates the pagination details associated with a set of data, such as users. It holds information about the current page, the number of items per page, the total number of items, and the total number of pages. This class provides methods to access these properties, offering a clean and organized way to manage and retrieve pagination information. The `hasNextPage` method is particularly useful, indicating whether subsequent pages of data are available, aiding in navigation and data retrieval processes.

### ListUsersRetriever Class

The `ListUsersRetriever` class is a service class responsible for retrieving a paginated list of users from an external API. It implements the `ListUsersRetrieverInterface`, ensuring it adheres to a specific contract for retrieving users. The class is dependent on an HTTP client, specified by the `HttpClientInterface`, to make requests to the external API. 

When the `getPaginatedUsers` method is invoked, it uses the HTTP client to send a GET request to retrieve user data for a specific page. The response from the API is then processed to create an array of `User` objects and a `Pagination` object, which are used to instantiate a `Users` model. 

---

### UserCreator Service

The `UserCreator` service is a specialized class designed to facilitate the creation of new users within the system. It implements the `UserCreatorInterface`, ensuring adherence to a predefined contract for user creation functionalities. This service is dependent on an HTTP client, injected via the constructor, to interact with an external API for user creation.

The core functionality of this service is encapsulated in the `createUser` method. This method accepts two parameters, `$name` and `$job`, representing the user's name and job respectively. It utilizes the injected HTTP client to send a POST request to the `/api/users` endpoint, carrying the user's name and job as payload.

Upon successful creation of the user, the external API responds with a JSON object containing the newly created user's details. The `createUser` method then processes this response, extracting and returning the user's ID as an integer. 