# View Batch Completions

`Here, viewBatchCompletions(batchId) creates a GET request to /batchtransactions/{batchId}/completions`

> `This API lists all transactions that have successfully completed for a given batch.`

### Usage / Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
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
    $request = Disbursement::viewBatchCompletions('<<BATCH-ID>>', $filter);

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
Array
(
    [data] => Array
        (
            [0] => mmpsdk\Disbursement\Models\BatchCompletion Object
                (
                    [completionDate:mmpsdk\Disbursement\Models\BatchCompletion:private] => 2021-12-15T07:42:07.740Z
                    [link:mmpsdk\Disbursement\Models\BatchCompletion:private] => string
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
