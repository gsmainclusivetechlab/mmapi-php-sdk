# mmapi-php-sdk

# mmapi-php-sdk

Use the MMAPI PHP SDK to get started quickly with the [GSMA Mobile Money API](https://developer.mobilemoneyapi.io/1.2).

## Requirements

-   PHP 5.4+
-   cURL PHP Extension
-   JSON PHP Extension

## Installation

### Composer

Update your composer.json file as per the example below and then run for this specific release

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

-   Download the latest stable release of php-sdk
-   Extract php-sdk into your projects vendor folder

```php
require 'path/to/sdk/autoload.php';
```
