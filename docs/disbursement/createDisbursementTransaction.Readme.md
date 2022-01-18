# Create A Disbursement Transaction

`Here, createDisbursementTransaction() creates a POST request to /transactions/type/disbursement`

> `Provided with a valid object representation, this endpoint allows for a new transaction to be created for a given transaction type 'disbursement' passed via the URL.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Disbursement\Disbursement;

$transaction = new Transaction();
$transaction
    ->setAmount('36.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678']);

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::createDisbursementTransaction($transaction);

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
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output - Callback

```php
a0467185-3006-4a4a-b980-94c91fdbe948

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => dfd94165-0c06-45c1-a870-720ba7579dc5
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => a0467185-3006-4a4a-b980-94c91fdbe948
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 18479
    [status:mmpsdk\Common\Models\RequestState:private] => pending
    [notificationMethod:mmpsdk\Common\Models\RequestState:private] => callback
    [pendingReason:mmpsdk\Common\Models\RequestState:private] =>
    [expiryTime:mmpsdk\Common\Models\RequestState:private] =>
    [pollLimit:mmpsdk\Common\Models\RequestState:private] => 100
    [errorReference:mmpsdk\Common\Models\RequestState:private] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)"pollLimit": 100
}
```

### Example Output - Polling

```php
a0467185-3006-4a4a-b980-94c91fdbe948

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => dfd94165-0c06-45c1-a870-720ba7579dc5
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => a0467185-3006-4a4a-b980-94c91fdbe948
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 18479
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
