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
    ->setScheduledStartDate('2019-12-11T15:08:03.158Z');

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
    $request = Disbursement::createBatchTransaction($batchTransaction);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
