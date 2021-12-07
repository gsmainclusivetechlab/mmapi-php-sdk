# mmapi-php-sdk

This SDK provides for an easy way to connect to [GSMA Mobile Money API](https://developer.mobilemoneyapi.io/1.2).

Please refer to the following documentation for installation instructions and usage information.

-   [API Documentation](https://developer.mobilemoneyapi.io/1.2)
-   [PHP SDK Documentation](docs/)
-   [How to use the test scripts](sample/)

## Requirements

-   PHP 5.4+
-   cURL PHP Extension
-   JSON PHP Extension

## Installation

### Composer

Update your composer.json file as per the example below and then run for this specific release `composer update`.

```json
{
    "require": {
        "php": ">=5.4",
        "mmpsdk/mmpsdk": "<version_number_here>"
    }
}
```

After installation through Composer, don't forget to require its autoloader in your script or bootstrap file:

```php
require 'vendor/autoload.php';
```

### Manual Installation

If you prefer not to use Composer, you can manually install the SDK.

-   Download the latest stable release of php-sdk
-   Extract php-sdk into your projects vendor folder
-   Require autoloader in your script or bootstrap file:
    ```php
    require 'path/to/sdk/autoload.php';
    ```

## Using the Test Scripts

You can find details on how to run the sample code [here](sample/)

## Building & Testing the SDK

Unit tests for the SDK are in the tests directory. These tests are mainly for SDK development.

-   Run `composer update --dev` to load the `PHPUnit` test library.
-   Copy the sdk-test-config.env.sample file to sdk-test-config.env and enter your credentials in the appropriate fields.
-   Run `composer run tests` to run the test suite.
