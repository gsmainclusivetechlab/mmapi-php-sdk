# Setup a Recurring Payment

`Here, createAccountDebitMandate(['identifierType' => 'identifier'], $debitMandate) creates a POST request to /accounts/{identifierType}/{identifier}/debitmandates`

> `Provided with a valid object representation, this endpoint allows for a new debit mandate to be created for a specific account where one identifier suffices to uniquely identify an account.`

`Here, createAccountDebitMandate([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], $debitMandate) creates a POST request to /accounts/{Account Identifiers}/debitmandates`

> `Provided with a valid object representation, this endpoint allows for a new debit mandate to be created for a specific account where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\RecurringPayment\Models\DebitMandate;
use mmpsdk\RecurringPayment\RecurringPayment;

$debitMandate = new DebitMandate();
$debitMandate
    ->setPayee([
        'accountid' => '2999'
    ])
    ->setCurrency('GBP')
    ->setAmountLimit('1000.00')
    ->setRequestDate('2018-07-03T10:43:27.405Z')
    ->setStartDate('2018-07-03T10:43:27.405Z')
    ->setEndDate('2028-07-03T10:43:27.405Z')
    ->setNumberOfPayments('2')
    ->setFrequencyType('sixmonths')
    ->setCustomData([
        'keytest' => 'keyvalue'
    ]);
$accountIdentifier = [
    'accountid' => '2000'
];

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = RecurringPayment::createAccountDebitMandate(
        $accountIdentifier,
        $debitMandate
    );

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::POLLING);

    /**
     * Get Client Correlation Id that will be sent along with request
     */
    $clientCorrelationId = $request->getClientCorrelationId()
    prettyPrint($clientCorrelationId);

    /**
     *Execute the request
     */
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}

```

### Example Output - Callback

```php
1eab4f19-8cb9-4632-a7d5-b4f4792e29b4

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 5d585d98-3636-404f-82b8-97dc758efefa
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 1eab4f19-8cb9-4632-a7d5-b4f4792e29b4
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 537
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
776c98ca-30e6-4055-a0b8-ce40a5975831

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => fa435c8d-c9d2-44c4-b35b-b5a977179aea
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 776c98ca-30e6-4055-a0b8-ce40a5975831
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 538
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

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewAccountDebitMandate()](viewAccountDebitMandate.Readme.md) function to acquire the final representation of the DebitMandate object.

---