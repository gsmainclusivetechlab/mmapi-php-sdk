# View Account Balance

1. `viewAuthorisationCode([ 'identifierType1' => 'identifier1' ], $authorisationCode) creates a GET request to /accounts/{identifierType}/{identifier}/authorisationcodes/{authorisationCode}`

> `This endpoint returns a specific Authorisation Code linked to an account.`

1. `Here, viewAuthorisationCode([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], $authorisationCode) creates a GET request to /accounts/{RequestorAccountIdentifiers}/authorisationcodes/{authorisationCode}`

> `This endpoint returns a specific Authorisation Code linked to an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\MerchantPayment\MerchantPayment;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = MerchantPayment::viewAuthorisationCode('<<AUTHORISATION-CODE>>');

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

### Example Output

```php
mmpsdk\Common\Models\Balance Object
(
    [authorisationCode:mmpsdk\Common\Models\AuthorisationCode:private] => ad922511-77ae-4c17-b674-f85a96fffbf7
    [codeState:mmpsdk\Common\Models\AuthorisationCode:private] => active
    [amount:mmpsdk\Common\Models\AuthorisationCode:private] => 1000.00
    [currency:mmpsdk\Common\Models\AuthorisationCode:private] => GBP
    [redemptionChannels:mmpsdk\Common\Models\AuthorisationCode:private] =>
    [redemptionTransactionTypes:mmpsdk\Common\Models\AuthorisationCode:private] =>
    [requestingOrganisation:mmpsdk\Common\Models\AuthorisationCode:private] =>
    [creationDate:mmpsdk\Common\Models\AuthorisationCode:private] => 2021-12-14T11:04:16
    [modificationDate:mmpsdk\Common\Models\AuthorisationCode:private] => 2021-12-14T11:04:16
    [requestDate:mmpsdk\Common\Models\AuthorisationCode:private] => 2021-12-14T16:34:14
    [customData:mmpsdk\Common\Models\AuthorisationCode:private] =>
    [metadata:mmpsdk\Common\Models\AuthorisationCode:private] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)

```
