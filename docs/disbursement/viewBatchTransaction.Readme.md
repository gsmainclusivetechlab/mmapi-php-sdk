# View A Transaction Batch

`Here, viewBatchTransaction(batchId) creates a GET request to /batchtransactions/{batchId}`

> `This endpoint returns the current status of a batch transaction.`

### Usage / Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Disbursement\Disbursement;

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::viewBatchTransaction("<<BATCH-ID>>");

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
mmpsdk\Disbursement\Models\BatchTransaction Object
(
    [batchId:mmpsdk\Disbursement\Models\BatchTransaction:private] => REF-1635751208477
    [batchStatus:mmpsdk\Disbursement\Models\BatchTransaction:private] => created
    [transactions:mmpsdk\Disbursement\Models\BatchTransaction:private] =>
    [approvalDate:mmpsdk\Disbursement\Models\BatchTransaction:private] =>
    [batchTitle:mmpsdk\Disbursement\Models\BatchTransaction:private] => Batch_Test
    [batchDescription:mmpsdk\Disbursement\Models\BatchTransaction:private] => Testing a Batch
    [requestingOrganisation:mmpsdk\Disbursement\Models\BatchTransaction:private] =>
    [scheduledStartDate:mmpsdk\Disbursement\Models\BatchTransaction:private] => 2019-12-11T15:08:03
    [modificationDate:mmpsdk\Disbursement\Models\BatchTransaction:private] => 2021-11-01T07:20:08
    [requestDate:mmpsdk\Disbursement\Models\BatchTransaction:private] => 2021-11-01T07:20:08
    [customData:mmpsdk\Disbursement\Models\BatchTransaction:private] =>
    [completionDate:mmpsdk\Disbursement\Models\BatchTransaction:private] =>
    [processingFlag:mmpsdk\Disbursement\Models\BatchTransaction:private] =>
    [completedCount:mmpsdk\Disbursement\Models\BatchTransaction:private] => 0
    [parsingSuccessCount:mmpsdk\Disbursement\Models\BatchTransaction:private] => 0
    [rejectionCount:mmpsdk\Disbursement\Models\BatchTransaction:private] => 0
    [creationDate:mmpsdk\Disbursement\Models\BatchTransaction:private] => 2021-11-01T07:20:08
    [metadata:mmpsdk\Disbursement\Models\BatchTransaction:private] =>
    [hydratorStrategies:protected] =>
    [availableCount:protected] => 0
)

```
