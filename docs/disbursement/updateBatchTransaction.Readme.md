# Update A Transaction Batch

`Here, updateBatchTransaction(batchId) creates a PATCH request to /batchtransactions/{batchId}`

> `This endpoint updates a specific transaction batch. Only the batchStatus field can be modified. The Batch Status is set to 'approved'`

### Usage / Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Common\Exceptions\SDKException;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::updateBatchTransaction('<<BATCH-ID>>');

    /**
     *Execute the request
     */
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getErrorObj());
}
```

### Example Output - Callback

```php
b645e3ed-98b1-42e1-8e58-b88fddf23123

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => b0b4941d-4c51-4453-8057-a767bbedb718
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => b645e3ed-98b1-42e1-8e58-b88fddf23123
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 486
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
b645e3ed-98b1-42e1-8e58-b88fddf23123

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => b0b4941d-4c51-4453-8057-a767bbedb718
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => b645e3ed-98b1-42e1-8e58-b88fddf23123
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 486
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

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewBatchTransaction()](viewBatchTransaction.Readme.md) function to acquire the final representation of the BatchTransaction object.

---