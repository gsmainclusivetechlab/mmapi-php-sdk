# Check for Service Availability

`viewServiceAvailability() creates a GET request to /heartbeat`

> `This endpoint returns the current status of the API.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Disbursement\Disbursement;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::viewServiceAvailability();

    /**
     *Execute the request
     */
    $repsonse = $request->execute();

    print_r($repsonse);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output

```php
stdClass Object
(
    [serviceStatus] => available
)
```
