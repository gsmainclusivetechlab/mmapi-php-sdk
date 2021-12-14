# Create An Authorisation Code Via An Account Identifier

`Here, createAuthorisationCode(['identifierType' => 'identifier'], $authorisationObj) creates a POST request to /accounts/{identifierType}/{identifier}/authorisationcodes`

> `This endpoint allows a mobile money payer or payee to generate a code which when presented to the other party, can be redeemed for an amount set by the payer or payee, depending upon the use case where one identifier suffices to uniquely identify an account.`

`Here, createAuthorisationCode([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], $authorisationObj) creates a POST request to /accounts/{AccountIdentifiers}/authorisationcodes`

> `This endpoint allows a mobile money payer or payee to generate a code which when presented to the other party, can be redeemed for an amount set by the payer or payee, depending upon the use case where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdk\Common\Models\AuthorisationCode;

$authorisationObj = new AuthorisationCode();
$authorisationObj
    ->setRequestDate(date('Y-m-d\TH:i:s\.40z'))
    ->setCurrency('GBP')
    ->setAmount('1001.00');
$accountIdentifier = [
    'accountid' => 2000
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = MerchantPayment::createAuthorisationCode(
        $accountIdentifier,
        $authorisationObj
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
0e277ed2-08fd-4872-99bd-8fbf523482d2

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 3eee90eb-ed25-459f-9653-71ea95c9c04a
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 0e277ed2-08fd-4872-99bd-8fbf523482d2
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 2309
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

<table>
<thead>
  <tr>
    <th>Scenarios</th>
    <th>API</th>
    <th>Function</th>
    <th>Parameters</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td rowspan="3">Payee-Initiated Merchant Payment using the Polling Method</td>
    <td>Payee Initiated Merchant Payment</td>
    <td>createMerchantTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td>Poll to Determine the Request State</td>
    <td>viewRequestState</td>
    <td>string $serverCorrelationId</td>
  </tr>
  <tr>
    <td>Retrieve a Transaction</td>
    <td>RequestState</td>
    <td>string $transactionReference</td>
  </tr>
  <tr>
    <td>Payee-Initiated Merchant Payment</td>
    <td>Payee Initiated Merchant Payment</td>
    <td>createMerchantTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td>Payer-Initiated Merchant Payment</td>
    <td>Payer Initiated Merchant Payment</td>
    <td>createMerchantTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td rowspan="3">Payee-Initiated Merchant Payment using a Pre-authorised Payment Code</td>
    <td>Obtain an Authorisation Code</td>
    <td>createAuthorisationCode</td>
    <td>array $accountIdentifier, AuthorisationCode $authorisationCode</td>
  </tr>
  <tr>
    <td>Perform a Merchant Payment</td>
    <td>createMerchantTransaction</td>
    <td>Transaction $transaction, string $callBackUrl = null</td>
  </tr>
  <tr>
    <td>View An Authorisation Code</td>
    <td>viewAuthorisationCode</td>
    <td>string $accountIdentifier, string $authorisationCode</td>
  </tr>
  <tr>
    <td>Merchant Payment Refund</td>
    <td>Perform a Merchant Payment Refund</td>
    <td>createRefundTransaction</td>
    <td>string $transactionReference, Reversal $reversal=null, string $callBackUrl=null</td>
  </tr>
  <tr>
    <td>Merchant Payment Reversal</td>
    <td>Perform a Merchant Payment Reversal</td>
    <td>createReversal</td>
    <td>string $transactionReference, Reversal $reversal=null, string $callBackUrl=null</td>
  </tr>
  <tr>
    <td>Obtain a Merchant Balance</td>
    <td>Get an Account Balance</td>
    <td>viewAccountBalance</td>
    <td>array $accountIdentifier, array $filter=null</td>
  </tr>
  <tr>
    <td>Retrieve Payments for a Merchant</td>
    <td>Retrieve a Set of Transactions for an Account</td>
    <td>viewAccountTransactions</td>
    <td>array $accountIdentifier, array $filter=null</td>
  </tr>
  <tr>
    <td>Check for Service Availability</td>
    <td>Check for Service Availability</td>
    <td>viewServiceAvailability</td>
    <td>NA</td>
  </tr>
  <tr>
    <td>Retrieve a Missing API Response</td>
    <td>Retrieve a Missing Response</td>
    <td>viewResponse</td>
    <td>string $clientCorrelationId, Object $objRef=null</td>
  </tr>
</tbody>
</table>
