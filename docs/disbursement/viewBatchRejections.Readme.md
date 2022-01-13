# View Batch Rejections

`Here, viewBatchRejections(batchId) creates a GET request to /batchtransactions/{batchId}/rejections`

> `This API enables clients to retrieve information on all transactions that have either failed parsing or have failed to complete.`

### Usage / Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Disbursement\Disbursement;

try {
    /**
     * Filter parameters
     */
    $filter = [
        'limit' => 10,
        'offset' => 0
    ];

    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::viewBatchRejections('<<BATCH-ID>>', $filter);

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
Array
(
    [data] => Array
        (
            [0] => mmpsdk\Disbursement\Models\BatchRejection Object
                (
                    [rejectionReason:mmpsdk\Disbursement\Models\BatchRejection:private] => string
                    [rejectionDate:mmpsdk\Disbursement\Models\BatchRejection:private] => 2021-12-15T07:51:34.934Z
                    [transactionReference:protected] => REF-1635751208477
                    [requestingOrganisationTransactionReference:protected] => REF-1625751208478
                    [creditParty:protected] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [key] => msisdn
                                    [value] => +33555123456
                                )

                        )

                    [debitParty:protected] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [key] => msisdn
                                    [value] => +33555123456
                                )

                        )

                    [customData:protected] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [key] => string
                                    [value] => string
                                )

                        )

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
