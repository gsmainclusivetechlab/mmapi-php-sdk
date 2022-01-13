# View an Account

1. `viewAccount([ identifierType => identifier ]) creates a GET request to /accounts/{identifierType}/{identifier}`

> `This endpoint returns the balance of an account where one identifier suffices to uniquely identify an account.`

1. `Here, viewAccount([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ]) creates a GET request to /accounts/{AccountIdentifiers}`

> `This endpoint returns the balance of an account where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\AgentService\AgentService;
use mmpsdk\Common\Exceptions\SDKException;

$accountIdentifier = [
    'msisdn' => '+411111111'
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $response = AgentService::viewAccount($accountIdentifier);

    /**
     *Execute the request
     */
    $repsonse = $request->execute();
chat
    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output

```php
mmpsdk\AgentService\Models\Account Object
(
    [accountIdentifiers:mmpsdk\AgentService\Models\Account:private] => Array
        (
            [0] => stdClass Object
                (
                    [key] => msisdn
                    [value] => +411111111
                )

        )

    [identity:mmpsdk\AgentService\Models\Account:private] => Array
        (
            [0] => mmpsdk\AgentService\Models\Identity Object
                (
                    [identityId:mmpsdk\AgentService\Models\Identity:private] => 256
                    [identityType:mmpsdk\AgentService\Models\Identity:private] => individual
                    [identityStatus:mmpsdk\AgentService\Models\Identity:private] => active
                    [identityKyc:mmpsdk\AgentService\Models\Identity:private] => mmpsdk\Common\Models\KYCInformation Object
                        (
                            [birthCountry:mmpsdk\Common\Models\KYCInformation:private] => AD
                            [dateOfBirth:mmpsdk\Common\Models\KYCInformation:private] => 2000-11-20
                            [contactPhone:mmpsdk\Common\Models\KYCInformation:private] => +447777777777
                            [emailAddress:mmpsdk\Common\Models\KYCInformation:private] => xyz@xyz.com
                            [employerName:mmpsdk\Common\Models\KYCInformation:private] => string
                            [gender:mmpsdk\Common\Models\KYCInformation:private] => m
                            [idDocument:mmpsdk\Common\Models\KYCInformation:private] => Array
                                (
                                    [0] => mmpsdk\Common\Models\IdDocument Object
                                        (
                                            [idType:mmpsdk\Common\Models\IdDocument:private] => passport
                                            [idNumber:mmpsdk\Common\Models\IdDocument:private] => 111111
                                            [issueDate:mmpsdk\Common\Models\IdDocument:private] => 2018-11-20
                                            [expiryDate:mmpsdk\Common\Models\IdDocument:private] => 2018-11-20
                                            [issuer:mmpsdk\Common\Models\IdDocument:private] => ABC
                                            [issuerPlace:mmpsdk\Common\Models\IdDocument:private] => DEF
                                            [issuerCountry:mmpsdk\Common\Models\IdDocument:private] => AD
                                            [otherIdDescription:mmpsdk\Common\Models\IdDocument:private] =>
                                            [hydratorStrategies:protected] =>
                                            [availableCount:protected] =>
                                        )

                                )

                            [nationality:mmpsdk\Common\Models\KYCInformation:private] => AD
                            [postalAddress:mmpsdk\Common\Models\KYCInformation:private] => mmpsdk\Common\Models\Address Object
                                (
                                    [addressLine1:mmpsdk\Common\Models\Address:private] => 37
                                    [addressLine2:mmpsdk\Common\Models\Address:private] => ABC Drive
                                    [addressLine3:mmpsdk\Common\Models\Address:private] => string
                                    [city:mmpsdk\Common\Models\Address:private] => Berlin
                                    [stateProvince:mmpsdk\Common\Models\Address:private] => string
                                    [postalCode:mmpsdk\Common\Models\Address:private] => AF1234
                                    [country:mmpsdk\Common\Models\Address:private] => AD
                                    [hydratorStrategies:protected] =>
                                    [availableCount:protected] =>
                                )

                            [occupation:mmpsdk\Common\Models\KYCInformation:private] => Miner
                            [subjectName:mmpsdk\Common\Models\KYCInformation:private] => mmpsdk\Common\Models\Name Object
                                (
                                    [title:mmpsdk\Common\Models\Name:private] => Mr
                                    [firstName:mmpsdk\Common\Models\Name:private] => H
                                    [middleName:mmpsdk\Common\Models\Name:private] => I
                                    [lastName:mmpsdk\Common\Models\Name:private] => J
                                    [fullName:mmpsdk\Common\Models\Name:private] => H I J
                                    [nativeName:mmpsdk\Common\Models\Name:private] => string
                                    [hydratorStrategies:protected] =>
                                    [availableCount:protected] =>
                                )

                            [hydratorStrategies:protected] =>
                            [availableCount:protected] =>
                        )

                    [accountRelationship:mmpsdk\AgentService\Models\Identity:private] => accountholder
                    [kycVerificationStatus:mmpsdk\AgentService\Models\Identity:private] => verified
                    [kycVerificationEntity:mmpsdk\AgentService\Models\Identity:private] => ABC Agent
                    [kycLevel:mmpsdk\AgentService\Models\Identity:private] => 1
                    [customData:mmpsdk\AgentService\Models\Identity:private] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [key] => test
                                    [value] => custom
                                )

                        )

                    [hydratorStrategies:protected] =>
                    [availableCount:protected] =>
                )

        )

    [accountType:mmpsdk\AgentService\Models\Account:private] => string
    [accountStatus:mmpsdk\AgentService\Models\Account:private] => available
    [accountSubStatus:mmpsdk\AgentService\Models\Account:private] => subStatus
    [currentBalance:mmpsdk\AgentService\Models\Account:private] =>
    [availableBalance:mmpsdk\AgentService\Models\Account:private] =>
    [reservedBalance:mmpsdk\AgentService\Models\Account:private] =>
    [unclearedBalance:mmpsdk\AgentService\Models\Account:private] =>
    [currency:mmpsdk\AgentService\Models\Account:private] =>
    [fees:mmpsdk\AgentService\Models\Account:private] => Array
        (
            [0] => mmpsdk\Common\Models\Fees Object
                (
                    [feeType:protected] => string
                    [feeAmount:protected] => 5.46
                    [feeCurrency:protected] => AED
                    [hydratorStrategies:protected] =>
                    [availableCount:protected] =>
                )

        )

    [commissionEarned:mmpsdk\AgentService\Models\Account:private] =>
    [registeringEntity:mmpsdk\AgentService\Models\Account:private] => ABC Agent
    [creationDate:mmpsdk\AgentService\Models\Account:private] => 2021-12-29T09:55:58
    [modificationDate:mmpsdk\AgentService\Models\Account:private] =>
    [requestDate:mmpsdk\AgentService\Models\Account:private] => 2021-02-17T15:41:45
    [customData:mmpsdk\AgentService\Models\Account:private] => Array
        (
            [0] => stdClass Object
                (
                    [key] => test
                    [value] => custom1
                )

        )

    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)

```
