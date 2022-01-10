# Retrieve a Set of Bills

1. `viewAccountBills([ identifierType => identifier ]) creates a GET request to /accounts/{identifierType}/{identifier}/bills`

> `This endpoint returns bills linked to an account where one identifier suffices to uniquely identify an account.`

2. `viewAccountBills([ 'identifierType1' => 'identifier1', 'identifierType2' => 'identifier2', 'identifierType3' => 'identifier3' ]) creates a GET request to /accounts/{AccountIdentifiers}/bills`

> `This endpoint returns bills linked to an account where a single identifier is not sufficient to identify an account.`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\BillPayment\BillPayment;

$accountIdentifier = [
    'accountid' => 2000
];
try {
    /**
     * Construct request object and set desired parameters
     */
    $request = BillPayment::viewAccountBills($accountIdentifier, [
        'limit' => 5
    ]);

    /**
     *Execute the request
     */
    $repsonse = $request->execute();

    print_r($repsonse);
} catch (SDKException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}
```

### Example Output

```php
Array(
    [data] => Array
        (
            [0] => mmpsdk\BillPayment\Models\Bill Object
                (
                    [billReference:mmpsdk\BillPayment\Models\Bill:private] => REF-000001
                    [billStatus:mmpsdk\BillPayment\Models\Bill:private] =>
                    [amountDue:mmpsdk\BillPayment\Models\Bill:private] => 50.00
                    [billDescription:mmpsdk\BillPayment\Models\Bill:private] =>
                    [currency:mmpsdk\BillPayment\Models\Bill:private] => GBP
                    [dueDate:mmpsdk\BillPayment\Models\Bill:private] => 2016-08-02
                    [minimumAmountDue:mmpsdk\BillPayment\Models\Bill:private] => 0.00
                    [creationDate:mmpsdk\BillPayment\Models\Bill:private] => 2021-01-17T00:00:00
                    [modificationDate:mmpsdk\BillPayment\Models\Bill:private] => 2021-02-17T00:00:00
                    [customData:mmpsdk\BillPayment\Models\Bill:private] =>
                    [metadata:mmpsdk\BillPayment\Models\Bill:private] =>
                    [hydratorStrategies:protected] =>
                    [availableCount:protected] => 0
                )
        )

    [metadata] => mmpsdk\Common\Models\MetaData Object
        (
            [returnedCount:mmpsdk\Common\Models\MetaData:private] =>
            [availableCount:mmpsdk\Common\Models\MetaData:private] =>
        )
)

```
