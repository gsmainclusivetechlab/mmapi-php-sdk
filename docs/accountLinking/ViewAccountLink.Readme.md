# Read a specific link for a given account.

1. `ViewAccountLink([ identifierType => identifier ], linkReference) creates a GET request to /accounts/{identifierType}/{identifier}/links/{linkReference}`

> `This endpoint returns a specific link where one identifier suffices to uniquely identify an account.`

2. `ViewAccountLink([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ], linkReference) creates a GET request to /accounts/{Account Identifiers}/links/{linkReference}`

> `This endpoint returns a specific link where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\AccountLinking\AccountLinking;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = AccountLinking::ViewAccountLink(
        $accountIdentifier,
        '<<LINK-REFERENCE>>'
    );

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
mmpsdk\AccountLinking\Models\Link Object
(
    [linkReference:mmpsdk\AccountLinking\Models\Link:private] => REF-1638185354992
    [sourceAccountIdentifiers:mmpsdk\AccountLinking\Models\Link:private] => Array
        (
            [0] => stdClass Object
                (
                    [key] => accountid
                    [value] => 2999
                )

            [1] => stdClass Object
                (
                    [key] => mandatereference
                    [value] => REF-1637907197912
                )

        )

    [mode:mmpsdk\AccountLinking\Models\Link:private] => both
    [status:mmpsdk\AccountLinking\Models\Link:private] => active
    [requestingOrganisation:mmpsdk\AccountLinking\Models\Link:private] => mmpsdk\Common\Models\RequestingOrganisation Object
        (
            [requestingOrganisationIdentifierType:mmpsdk\Common\Models\RequestingOrganisation:private] => organisationid
            [requestingOrganisationIdentifier:mmpsdk\Common\Models\RequestingOrganisation:private] => 12345
            [hydratorStrategies:protected] => 
            [availableCount:protected] => 
        )

    [creationDate:mmpsdk\AccountLinking\Models\Link:private] => 2021-11-29T11:29:15
    [modificationDate:mmpsdk\AccountLinking\Models\Link:private] => 2021-11-29T11:29:15
    [requestDate:mmpsdk\AccountLinking\Models\Link:private] => 
    [customData:mmpsdk\AccountLinking\Models\Link:private] => Array
        (
            [0] => stdClass Object
                (
                    [key] => keytest
                    [value] => keyvalue
                )

        )

    [hydratorStrategies:protected] => 
    [availableCount:protected] => 0
)
```
