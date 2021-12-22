# Establish an Account to Account Link

`Here, createAccountLink(['identifierType' => 'identifier'], $link) creates a POST request to /accounts/{identifierType}/{identifier}/links`

> `Provided with a valid object representation, this endpoint allows a new link to be created for a specific account where one identifier suffices to uniquely identify an account.`

`Here, createAccountLink([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], $link) creates a POST request to /accounts/{identifierType}/{identifier}/links`

> `Provided with a valid object representation, this endpoint allows a new link to be created for a specific account where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php

<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\AccountLinking\Models\Link;
use mmpsdk\AccountLinking\AccountLinking;
use mmpsdk\AccountLinking\Enums\LinkStatus;
use mmpsdk\AccountLinking\Enums\OperationMode;

$link = new Link();
$link
    ->setSourceAccountIdentifiers(['accountid' => '2999'])
    ->setStatus(LinkStatus::ACTIVE)
    ->setMode(OperationMode::BOTH)
    ->setCustomData(['keytest' => 'keyvalue']);
$requestingOrganisation = new RequestingOrganisation();
$requestingOrganisation
    ->setRequestingOrganisationIdentifierType('organisationid')
    ->setRequestingOrganisationIdentifier('12345');
$link->setRequestingOrganisation($requestingOrganisation);

$accountIdentifier = [
    'accountid' => 2000
];

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AccountLinking::createAccountLink($accountIdentifier, $link);

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
e31c97d4-3ad3-4293-a5ce-77e77e5a4bef

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 827b44af-a679-45a7-97f7-5990907f53e8
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => e31c97d4-3ad3-4293-a5ce-77e77e5a4bef
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 392
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
e31c97d4-3ad3-4293-a5ce-77e77e5a4bef

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 827b44af-a679-45a7-97f7-5990907f53e8
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => e31c97d4-3ad3-4293-a5ce-77e77e5a4bef
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 392
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

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewAccountLink()](viewAccountLink.Readme.md) function to acquire the final representation of the AccountLink object.

---
