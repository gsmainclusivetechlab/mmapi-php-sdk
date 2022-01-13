# Create A Transaction Batch

`createBatchTransaction() creates a POST request to /batchtransactions`

> `Provided with a valid object representation, this endpoint allows for a new transaction batch to be created`

### Usage/Examples

```php
<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Disbursement\Disbursement;

$batchTransaction = new BatchTransaction();
$batchTransaction
    ->setBatchTitle('Batch_Test')
    ->setBatchDescription('Testing a Batch')
    ->setScheduledStartDate(date('Y-m-d\TH:i:s'));

$transactionsArray = [];
$transactionItem1 = new Transaction();
$transactionItem2 = new Transaction();
$transactionItem1
    ->setCreditParty(['accountid' => '2000'])
    ->setDebitParty(['accountid' => '2999'])
    ->setCurrency('RWF')
    ->setAmount('200.00')
    ->setType('transfer');
$transactionItem2
    ->setCreditParty(['accountid' => '2999'])
    ->setDebitParty(['accountid' => '2000'])
    ->setCurrency('RWF')
    ->setAmount('200.00')
    ->setType('transfer');
array_push($transactionsArray, $transactionItem1);
array_push($transactionsArray, $transactionItem2);
$batchTransaction->setTransactions($transactionsArray);

try {
    /**
     * Construct request object and set desired parameters
     */
    $request = Disbursement::createBatchTransaction($batchTransaction);

    /**
     * Choose notification method can be either Callback or Polling
     */
    $request->setNotificationMethod(NotificationMethod::POLLING);

    /**
     * Get Client Correlation Id that will be sent along with request
     */
    $clientCorrelationId = $request->getClientCorrelationId()
    print_r($clientCorrelationId);

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

### Example Output - Callback

```php
dc071284-61b0-4122-b5a5-9f1b11ea970c

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => b0b17e14-c937-4363-a131-f0d83c054f96
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => dc071284-61b0-4122-b5a5-9f1b11ea970c
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 1684
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
dc071284-61b0-4122-b5a5-9f1b11ea970c

mmpsdk\Common\Models\RequestState Object
(
    [serverCorrelationId:mmpsdk\Common\Models\RequestState:private] => b0b17e14-c937-4363-a131-f0d83c054f96
    [clientCorrelationId:mmpsdk\Common\Models\RequestState:private] => dc071284-61b0-4122-b5a5-9f1b11ea970c
    [objectReference:mmpsdk\Common\Models\RequestState:private] => 1684
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

In asynchronous flows, a callback mechanism or polling mechanism is utilised to allow the client to determine the request's final state. Use the [viewRequestState()](viewRequestState.Readme.md) function for the polling mechanism to receive the status of a request, and the [viewBatchTransaction()](viewBatchTransaction.Readme.md) function to acquire the final representation of the BatchTransaction object.

---
