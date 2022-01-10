# Perform a Transaction Reversal

`createReversal(originalTransactionReference) creates a POST request to /transactions/{transactionReference}/reversals`

> `Provided with a valid object representation, this endpoint allows for a new reversal to be created`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\AccountLinking\AccountLinking;

$transactionReference = '<<TRANSACTION-REFERENCE-HERE>>';
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AccountLinking::createReversal($transactionReference);

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::CALLBACK);

    /**
     * Get Client Correlation Id that will be sent along with request
     */
    $clientCorrelationId = $request->getClientCorrelationId()
    print_r($clientCorrelationId);

    /**
     *Execute the request
     */
    $repsonse = $request->execute();

    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}

```

### Example Output - Callback

```php
a5bc3278-1cf8-4250-8a24-9ebea61a6651

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 4620aadc-ba80-44c1-8a98-18df4716f9bf
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => a5bc3278-1cf8-4250-8a24-9ebea61a6651
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 18257
    [status:mmpsdk\Common\Models\RequestState:private] => pending
    [notificationMethod:mmpsdk\Common\Models\RequestState:private] => callback
    [pendingReason:mmpsdk\Common\Models\RequestState:private] =>
    [expiryTime:mmpsdk\Common\Models\RequestState:private] =>
    [pollLimit:mmpsdk\Common\Models\RequestState:private] => 100
    [errorReference:mmpsdk\Common\Models\RequestState:private] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)

```

### Example Output - Polling

```php
4890d1ab-0995-4523-94ef-97cedae212c1

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 75659c6e-d48a-42d7-9355-ee4e2f3b5112
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 4890d1ab-0995-4523-94ef-97cedae212c1
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 2308
    [status:mmpsdk\Common\Models\RequestState:private] => pending
    [notificationMethod:mmpsdk\Common\Models\RequestState:private] => polling
    [pendingReason:mmpsdk\Common\Models\RequestState:private] =>
    [expiryTime:mmpsdk\Common\Models\RequestState:private] =>
    [pollLimit:mmpsdk\Common\Models\RequestState:private] => 100
    [errorReference:mmpsdk\Common\Models\RequestState:private] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)
```

---

**NOTE**

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewTransaction()](viewTransaction.Readme.md) function to acquire the final representation of the Transaction object.

---
