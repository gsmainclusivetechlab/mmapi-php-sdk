# Make a Bill Payment

`Here, createBillPayment(['identifierType' => 'identifier'], billReference, $billPay) creates a POST request to /accounts/{identifierType}/{identifier}/bills/{billReference}/payments`

> `Provided with a valid object representation, this endpoint allows for a new bill payment to be created for a specific account where one identifier suffices to uniquely identify an account.`

`Here, createBillPayment([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], billReference, $billPay) creates a POST request to /accounts/{AccountIdentifiers}/bills/{billReference}/payments`

> `Provided with a valid object representation, this endpoint allows for a new bill payment to be created for a specific account where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\BillPayment\Models\BillPay;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\BillPayment\BillPayment;

$accountIdentifier = [
    'accountid' => 2000
];
$billPay = new BillPay();
$billPay
    ->setCurrency('USD')
    ->setAmountPaid('5.30');
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = BillPayment::createBillPayment(
        $accountIdentifier,
        '<<BILL-REFERENCE-HERE>>',
        $billPay
    );

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
69d6514b-1278-4ffa-88d3-b4384158717d

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => d52d5370-7906-4e18-ac01-d198332d915e
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 69d6514b-1278-4ffa-88d3-b4384158717d
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 1150
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
69d6514b-1278-4ffa-88d3-b4384158717d

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => d52d5370-7906-4e18-ac01-d198332d915e
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 69d6514b-1278-4ffa-88d3-b4384158717d
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 1150
    [status:mmpsdk\Common\Models\RequestState:private] => pending
    [notificationMethod:mmpsdk\Common\Models\RequestState:private] => Polling
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

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewBillPayment()](viewBillPayment.Readme.md) function to acquire the final representation of the BillPay object.

---
