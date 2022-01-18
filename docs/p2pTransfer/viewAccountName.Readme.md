# Retrieve the Name of the Recipient

1. `viewAccountName([ identifierType => identifier ]) creates a GET request to /accounts/{identifierType}/{identifier}/accountname`

> `This endpoint returns the name of an account holder where one identifier suffices to uniquely identify an account.`

2. `Here, viewAccountName([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ]) creates a GET request to /accounts/{AccountIdentifiers}/accountname`

> `This endpoint returns the name of an account holder where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';

use mmpsdk\Common\Exceptions\MobileMoneyException;
use mmpsdk\P2PTransfer\P2PTransfer;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = P2PTransfer::viewAccountName($accountIdentifier);

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

### Example Output

```php
mmpsdk\Common\Models\AccountHolderName Object
(
    [name:mmpsdk\Common\Models\AccountHolderName:private] => mmpsdk\Common\Models\Name Object
        (
            [title:mmpsdk\Common\Models\Name:private] => Mr
            [firstName:mmpsdk\Common\Models\Name:private] => Jeff
            [middleName:mmpsdk\Common\Models\Name:private] => James
            [lastName:mmpsdk\Common\Models\Name:private] => Jimmer
            [fullName:mmpsdk\Common\Models\Name:private] => Jeff Jimmer
            [nativeName:mmpsdk\Common\Models\Name:private] =>
            [hydratorStrategies:protected] =>
            [availableCount:protected] =>
        )

    [lei:mmpsdk\Common\Models\AccountHolderName:private] => AAAA0012345678901299
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)

```
