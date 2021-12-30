# Create an Account

`Here, createAccount() creates a POST request to /accounts/individual`

> `Provided with a valid object representation, this endpoint allows for a new account to be created`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\AgentService\AgentService;
use mmpsdk\AgentService\Models\Account;
use mmpsdk\AgentService\Models\Identity;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;

$postalAddress = new Address();
$postalAddress
    ->setCountry('AD')
    ->setAddressLine1('37')
    ->setAddressLine2('ABC Drive')
    ->setAddressLine3('string')
    ->setCity('Berlin')
    ->setStateProvince('string')
    ->setPostalCode('AF1234');
$subjectName = new Name();
$subjectName
    ->setTitle('Mr')
    ->setFirstName('H')
    ->setMiddleName('I')
    ->setLastName('J')
    ->setFullName('H I J')
    ->setNativeName('string');
$idDocument = [
    (new IdDocument())
        ->setIdType('passport')
        ->setIdNumber('111111')
        ->setIssueDate('2018-11-20')
        ->setExpiryDate('2018-11-20')
        ->setIssuer('ABC')
        ->setIssuerPlace('DEF')
        ->setIssuerCountry('AD')
];
$identityKyc = new KYCInformation();
$identityKyc
    ->setNationality('AD')
    ->setDateOfBirth('2000-11-20')
    ->setOccupation('Miner')
    ->setEmployerName('string')
    ->setContactPhone('+447777777777')
    ->setGender('m')
    ->setEmailAddress('xyz@xyz.com')
    ->setBirthCountry('AD')
    ->setIdDocument($idDocument)
    ->setPostalAddress($postalAddress)
    ->setSubjectName($subjectName);
$identity = [
    (new Identity())
        ->setAccountRelationship('accountholder')
        ->setKycVerificationStatus('verified')
        ->setKycVerificationEntity('ABC Agent')
        ->setKycLevel(1)
        ->setIdentityKyc($identityKyc)
];

$account = new Account();
$account
    ->setAccountIdentifiers(['accountid' => '2001'])
    ->setIdentity($identity)
    ->setAccountType('string')
    ->setRegisteringEntity('ABC Agent')
    ->setrequestDate('2021-02-17T15:41:45.194Z');

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AgentService::createAccount($account);

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
