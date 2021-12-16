# Request a P2P Quotation

`Here, createQuotation(quotation) creates a POST request to /quotations`

> `Provided with a valid object representation, this endpoint allows for a new quotation to be created.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Enums\DeliveryMethodType;
use mmpsdk\Common\Models\Quotation;

$quotation = new Quotation();
$quotation
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678'])
    ->setRequestAmount('77.30')
    ->setRequestCurrency('RWF')
    ->setRequestDate('2018-07-03T11:43:27.405Z')
    ->setType('transfer')
    ->setSubtype('abc')
    ->setChosenDeliveryMethod(DeliveryMethodType::DIRECT_TO_ACCOUNT)
    ->setCustomData(['keytest' => 'keyvalue']);
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = P2PTransfer::createQuotation($quotation);

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::CALLBACK);

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
d9f875e0-6317-4b7b-82f2-06c709043b04

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => efa39ae1-04d8-4511-b350-2ead2c8f6cd0
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => d9f875e0-6317-4b7b-82f2-06c709043b04
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 1498
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
9d28aa77-1f18-497f-8f96-3367e4b61fd8

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 563ae419-2eac-4099-b146-06085a5e96b4
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 9d28aa77-1f18-497f-8f96-3367e4b61fd8
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 1499
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

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewQuotation()](viewQuotation.Readme.md) function to acquire the final representation of the Quotation object.

---
