[WORK IN PROGRESS]

The focus of this library is to provide a simple way to create factories from outside the Laravel application.  For example, in an end-to-end test suite in Cypress or Playwright.

It takes arguments in the JSON format and returns a JSON string of the factory output.

```bash
php artisan hyvor:factory "json"
```

## Input

```json
{
    "model": "App\\Models\\User",
    "count": 10,
    "attributes": {
        "name": "John Doe",
        "email": ""
    }
}
```

## Output

Output is also in JSON format.  If the count is `1`, the output will be a single object. If count is greater than `1`, the output will be an array of objects.
