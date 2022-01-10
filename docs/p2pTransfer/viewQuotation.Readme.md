# Retrieve a Quotation

`Here, viewQuotation(quotationReference) creates a GET request to /quotations/{quotationReference}`

> `This endpoint returns a specific quotation.`

### Usage/Examples

```php

<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\P2PTransfer\P2PTransfer;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = P2PTransfer::viewQuotation('<<QUOTATION-REFERENCE-HERE>>');

    /**
     *Execute the request
     */
    $repsonse = $request->execute();
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getErrorObj());
}
```

### Example Output

```javascript
mmpsdk\Common\Models\Quotation Object
(
    [quotationReference:mmpsdk\Common\Models\Quotation:private] => REF-1637057900018
    [creditParty:mmpsdk\Common\Models\Quotation:private] => Array
        (
            [0] => stdClass Object
                (
                    [key] => msisdn
                    [value] => +449999999
                )

            [1] => stdClass Object
                (
                    [key] => walletid
                    [value] => 1
                )

            [2] => stdClass Object
                (
                    [key] => accountid
                    [value] => 1
                )

            [3] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1583141449478
                )

            [4] => stdClass Object
                (
                    [key] => linkref
                    [value] => REF-1473082363913
                )

        )

    [debitParty:mmpsdk\Common\Models\Quotation:private] => Array
        (
            [0] => stdClass Object
                (
                    [key] => msisdn
                    [value] => +44012345678
                )

            [1] => stdClass Object
                (
                    [key] => accountid
                    [value] => 3
                )

            [2] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1601985847787
                )
        )

    [type:mmpsdk\Common\Models\Quotation:private] => transfer
    [subtype:mmpsdk\Common\Models\Quotation:private] =>
    [quotationStatus:mmpsdk\Common\Models\Quotation:private] => completed
    [requestAmount:mmpsdk\Common\Models\Quotation:private] => 77.30
    [requestCurrency:mmpsdk\Common\Models\Quotation:private] => RWF
    [availableDeliveryMethod:mmpsdk\Common\Models\Quotation:private] =>
    [chosenDeliveryMethod:mmpsdk\Common\Models\Quotation:private] => agent
    [originCountry:mmpsdk\Common\Models\Quotation:private] => AD
    [receivingCountry:mmpsdk\Common\Models\Quotation:private] => AD
    [quotes:mmpsdk\Common\Models\Quotation:private] =>
    [recipientKyc:mmpsdk\Common\Models\Quotation:private] =>
    [senderKyc:mmpsdk\Common\Models\Quotation:private] => mmpsdk\Common\Models\KYCInformation Object
        (
            [birthCountry:mmpsdk\Common\Models\KYCInformation:private] => GB
            [dateOfBirth:mmpsdk\Common\Models\KYCInformation:private] => 1970-07-03
            [contactPhone:mmpsdk\Common\Models\KYCInformation:private] => +447125588999
            [emailAddress:mmpsdk\Common\Models\KYCInformation:private] => luke.skywalkeraaabbb@gmail.com
            [employerName:mmpsdk\Common\Models\KYCInformation:private] => MFX
            [gender:mmpsdk\Common\Models\KYCInformation:private] => m
            [idDocument:mmpsdk\Common\Models\KYCInformation:private] => Array
                (
                    [0] => mmpsdk\Common\Models\IdDocument Object
                        (
                            [idType:mmpsdk\Common\Models\IdDocument:private] => nationalidcard
                            [idNumber:mmpsdk\Common\Models\IdDocument:private] => 1234567
                            [issueDate:mmpsdk\Common\Models\IdDocument:private] => 2018-07-03
                            [expiryDate:mmpsdk\Common\Models\IdDocument:private] => 2021-07-03
                            [issuer:mmpsdk\Common\Models\IdDocument:private] => UKPA
                            [issuerPlace:mmpsdk\Common\Models\IdDocument:private] => GB
                            [issuerCountry:mmpsdk\Common\Models\IdDocument:private] => GB
                            [otherIdDescription:mmpsdk\Common\Models\IdDocument:private] =>
                            [hydratorStrategies:protected] =>
                            [availableCount:protected] =>
                        )

                )

            [nationality:mmpsdk\Common\Models\KYCInformation:private] => GB
            [postalAddress:mmpsdk\Common\Models\KYCInformation:private] => mmpsdk\Common\Models\Address Object
                (
                    [addressLine1:mmpsdk\Common\Models\Address:private] => 111 ABC Street
                    [addressLine2:mmpsdk\Common\Models\Address:private] =>
                    [addressLine3:mmpsdk\Common\Models\Address:private] =>
                    [city:mmpsdk\Common\Models\Address:private] => New York
                    [stateProvince:mmpsdk\Common\Models\Address:private] => New York
                    [postalCode:mmpsdk\Common\Models\Address:private] => ABCD
                    [country:mmpsdk\Common\Models\Address:private] => GB
                    [hydratorStrategies:protected] =>
                    [availableCount:protected] =>
                )

            [occupation:mmpsdk\Common\Models\KYCInformation:private] => Manager
            [subjectName:mmpsdk\Common\Models\KYCInformation:private] => mmpsdk\Common\Models\Name Object
                (
                    [title:mmpsdk\Common\Models\Name:private] => Mr
                    [firstName:mmpsdk\Common\Models\Name:private] => Luke
                    [middleName:mmpsdk\Common\Models\Name:private] => R
                    [lastName:mmpsdk\Common\Models\Name:private] => Skywalker
                    [fullName:mmpsdk\Common\Models\Name:private] => Luke R Skywalker
                    [nativeName:mmpsdk\Common\Models\Name:private] => ABC
                    [hydratorStrategies:protected] =>
                    [availableCount:protected] =>
                )

            [hydratorStrategies:protected] =>
            [availableCount:protected] =>
        )

    [recipientBlockingReason:mmpsdk\Common\Models\Quotation:private] =>
    [senderBlockingReason:mmpsdk\Common\Models\Quotation:private] =>
    [requestingOrganisation:mmpsdk\Common\Models\Quotation:private] =>
    [sendingServiceProviderCountry:mmpsdk\Common\Models\Quotation:private] => AD
    [creationDate:mmpsdk\Common\Models\Quotation:private] => 2021-11-16T10:18:20
    [modificationDate:mmpsdk\Common\Models\Quotation:private] => 2021-11-16T10:18:20
    [requestDate:mmpsdk\Common\Models\Quotation:private] => 2018-07-03T11:43:27
    [customData:mmpsdk\Common\Models\Quotation:private] => Array
        (
            [0] => stdClass Object
                (
                    [key] => keytest
                    [value] => keyvalue
                )

        )

    [metadata:mmpsdk\Common\Models\Quotation:private] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)
```
