# View A Request State

`Here, viewRequestState(serverCorrelationId) creates a GET request to /requeststates/{serverCorrelationId}`

> `This endpoint returns a specific request state`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\MerchantPayment\MerchantPayment;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = MerchantPayment::viewRequestState('<<SERVER-CORRELATION-ID>>');

    /**
     *Execute the request
     */
    $response = $request->execute();

    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output

```php
mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => ea495e98-b5d2-4b03-ba43-4dfbce39cc60
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] =>
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 2b68c2a7-e0ef-4fa8-b180-ec092993016c
    [status:mmpsdk\Common\Models\RequestState:private] => completed
    [notificationMethod:mmpsdk\Common\Models\RequestState:private] => polling
    [pendingReason:mmpsdk\Common\Models\RequestState:private] =>
    [expiryTime:mmpsdk\Common\Models\RequestState:private] =>
    [pollLimit:mmpsdk\Common\Models\RequestState:private] => 100
    [errorReference:mmpsdk\Common\Models\RequestState:private] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)

```
