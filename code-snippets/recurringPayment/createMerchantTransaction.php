# Take a Recurring Payment

`createMerchantTransaction() creates a POST request to /transactions/type/merchantpay`

> `Provided with a valid object representation, this endpoint allows for a new transaction to be created for a given transaction type 'merchantpay' passed via the URL.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\RecurringPayment\RecurringPayment;

$transaction = new Transaction();
$transaction
    ->setAmount('16.00')
    ->setCurrency('USD')
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678']);
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = RecurringPayment::createMerchantTransaction($transaction);

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
    $response = $request->execute();

    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}

```

### Example Output - Callback

```php
d7694229-093f-41e2-8809-20484df69d66

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 2b9c8f54-bbb7-458a-b8ab-4f9d667b35a4
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => d7694229-093f-41e2-8809-20484df69d66
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 18255
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
8d4d4b6e-bcef-446a-892c-118843970b3d

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => b0c8b065-88f8-4a16-8a07-ed9413ea8800
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 8d4d4b6e-bcef-446a-892c-118843970b3d
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 18256
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
