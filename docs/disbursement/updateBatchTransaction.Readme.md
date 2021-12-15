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

```javascript
202

{
  "serverCorrelationId": "ad221629-1d95-4832-ae46-62d86146d7e0",
  "status": "pending",
  "notificationMethod": "polling",
  "objectReference": "750",
  "pollLimit": 100
}
```
