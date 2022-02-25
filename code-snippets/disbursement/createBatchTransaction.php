<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\MobileMoneyException;
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
    $response = $request->execute();
    print_r($response);
} catch (MobileMoneyException $ex) {
    print_r($ex->getMessage());
    print_r($ex->getErrorObj());
}