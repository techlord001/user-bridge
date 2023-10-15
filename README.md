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