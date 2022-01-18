# Perform an International Transfer

`Here, createInternationalTransaction() creates a POST request to /transactions/type/inttransfer`

> `Provided with a valid object representation, this endpoint allows for a new transaction to be created for a given transaction type 'inttransfer' passed via the URL.`

### Usage/Examples

```php

<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\Common\Models\RequestingOrganisation;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\InternationalTransfer\Models\InternationalTransferInformation;
use mmpsdk\InternationalTransfer\InternationalTransfer;

$transaction = new Transaction();
$transaction
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678'])
    ->setAmount('100.00')
    ->setCurrency('GBP');
$postalAddress = new Address();
$postalAddress
    ->setCountry('GB')
    ->setAddressLine1('111 ABC Street')
    ->setCity('New York')
    ->setStateProvince('New York')
    ->setPostalCode('ABCD');
$subjectName = new Name();
$subjectName
    ->setTitle('Mr')
    ->setFirstName('Luke')
    ->setMiddleName('R')
    ->setLastName('Skywalker')
    ->setFullName('Luke R Skywalker')
    ->setNativeName('ABC');
$idDocument = [
    (new IdDocument())
        ->setIdType('nationalidcard')
        ->setIdNumber('1234567')
        ->setIssueDate('2018-07-03T11:43:27.405Z')
        ->setExpiryDate('2021-07-03T11:43:27.405Z')
        ->setIssuer('UKPA')
        ->setIssuerPlace('GB')
        ->setIssuerCountry('GB')
        ->setOtherIdDescription('test')
];
$senderKyc = new KYCInformation();
$senderKyc
    ->setNationality('GB')
    ->setDateOfBirth('1970-07-03T11:43:27.405Z')
    ->setOccupation('Manager')
    ->setEmployerName('MFX')
    ->setContactPhone('+447125588999')
    ->setGender('m')
    ->setEmailAddress('luke.skywalkeraaabbb@gmail.com')
    ->setBirthCountry('GB')
    ->setIdDocument($idDocument)
    ->setPostalAddress($postalAddress)
    ->setSubjectName($subjectName);
$requestingOrganisation = new RequestingOrganisation();
$requestingOrganisation
    ->setRequestingOrganisationIdentifierType('organisationid')
    ->setRequestingOrganisationIdentifier('testorganisation');
$internationalTransferInformation = new InternationalTransferInformation();
$internationalTransferInformation
    ->setOriginCountry('GB')
    ->setQuotationReference('REF-1636533068206')
    ->setReceivingCountry('RW')
    ->setRemittancePurpose('personal')
    ->setRelationshipSender('none')
    ->setDeliveryMethod('agent')
    ->setSendingServiceProviderCountry('AD');
$transaction
    ->setSenderKyc($senderKyc)
    ->setRequestingOrganisation($requestingOrganisation)
    ->setInternationalTransferInformation($internationalTransferInformation);
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = InternationalTransfer::createInternationalTransaction(
        $transaction
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
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output - Callback

```php
6c5b581d-bc99-46f3-96ca-8b80bb19c0ae

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 495495d3-9780-4d05-a995-d2fe9768e2c1
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 6c5b581d-bc99-46f3-96ca-8b80bb19c0ae
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 18321
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
6258d653-e076-4470-93f5-f958fbfff6ab

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 30c42873-1714-439a-8a5b-b82e43d28ea1
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 6258d653-e076-4470-93f5-f958fbfff6ab
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 18324
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
