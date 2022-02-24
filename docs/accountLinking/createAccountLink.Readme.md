# Establish an Account to Account Link

`Here, createAccountLink(['identifierType' => 'identifier'], $link) creates a POST request to /accounts/{identifierType}/{identifier}/links`

> `Provided with a valid object representation, this endpoint allows a new link to be created for a specific account where one identifier suffices to uniquely identify an account.`

`Here, createAccountLink([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], $link) creates a POST request to /accounts/{identifierType}/{identifier}/links`

> `Provided with a valid object representation, this endpoint allows a new link to be created for a specific account where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
![This is an image](/codesnippets/accountLinking/creatAccounLinking.php)
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
