# Update an Account Identity

`Here, updateAccountIdentity() creates a PATCH request to /accounts/{accountId}/identities/{identityId}`

> `This endpoint updates an account identity. identityStatus, kycVerificationStatus, kycVerificationEntity and kycLevel field updates are permitted.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Models\PatchData;

$accountIdentifier = ['accountid' => '2000'];
$patchRequest = new PatchData();
$patchRequest
    ->setOp(PatchData::REPLACE)
    ->setPath('/kycVerificationStatus')
    ->setValue('verified');

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AgentService::updateAccountIdentity($accountIdentifier, '<<IDENDITY_ID>>', [
        $patchRequest
    ]);

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

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewAccount()](viewAccount.Readme.md) function to acquire the final representation of the Account object.

---
