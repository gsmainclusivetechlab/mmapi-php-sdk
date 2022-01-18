# Create A Reversal

`Here, createReversal(originalTransactionReference) creates a POST request to /transactions/{transactionReference}/reversals`

> `Provided with a valid object representation, this endpoint allows for a new reversal to be created`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Disbursement\Disbursement;
use mmpsdk\Common\Exceptions\MobileMoneyException;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::createReversal('<<TRANSACTION-REFERENCE>>');

     /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::POLLING);

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
} catch (MobileMoneyException $ex) {
    print_r($ex->getErrorObj());
}
```

### Example Output

```php
9138c1e9-dc32-4540-8d34-178803297e6a

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 9bc91edc-73d9-4265-a144-474cd52bf746
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 9138c1e9-dc32-4540-8d34-178803297e6a
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 7902
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

---

**NOTE**

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewTransaction()](viewTransaction.Readme.md) function to acquire the final representation of the Transaction object.

---
