# Request a International Transfer Quotation

`Here, createQuotation(quotation) creates a POST request to /quotations`

> `Provided with a valid object representation, this endpoint allows for a new quotation to be created.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdk\Common\Enums\NotificationMethod;
use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\Common\Models\Address;
use mmpsdk\Common\Models\IdDocument;
use mmpsdk\Common\Models\KYCInformation;
use mmpsdk\Common\Models\Name;
use mmpsdk\Common\Enums\DeliveryMethodType;
use mmpsdk\InternationalTransfer\Enums\InternationalTransactionType;
use mmpsdk\Common\Models\Quotation;

$quotation = new Quotation();
$quotation
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678'])
    ->setRequestAmount('77.30')
    ->setRequestCurrency('RWF')
    ->setRequestDate('2018-07-03T11:43:27.405Z')
    ->setType(InternationalTransactionType::INTERNATIONAL)
    ->setSubtype('abc')
    ->setChosenDeliveryMethod(DeliveryMethodType::AGENT)
    ->setSendingServiceProviderCountry('AD')
    ->setOriginCountry('AD')
    ->setReceivingCountry('AD')
    ->setCustomData(['keytest' => 'keyvalue']);
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
$quotation->setSenderKyc($senderKyc);
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = InternationalTransfer::createQuotation($quotation);

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
009baa82-8ed4-4a88-b82e-32bedb541cb5

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => 26f80290-7776-4c28-8613-aceb2f187faf
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => 009baa82-8ed4-4a88-b82e-32bedb541cb5
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 1493
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
f84bb9eb-6e83-4ce2-b17a-8dfdb4be7f19

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => a54a4b31-346d-4393-ad41-55a76bcdee64
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => f84bb9eb-6e83-4ce2-b17a-8dfdb4be7f19
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 1495
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
