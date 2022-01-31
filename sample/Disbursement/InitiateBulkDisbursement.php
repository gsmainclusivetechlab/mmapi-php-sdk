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
    ->setScheduledStartDate('2019-12-11T15:08:03.158Z');

$transactionsArray = [];
$transactionItem1 = new Transaction();
$transactionItem2 = new Transaction();
$transactionItem1
    ->setCreditParty(['walletid' => '1'])
    ->setDebitParty(['msisdn' => '+44012345678'])
    ->setCurrency('RWF')
    ->setAmount('200.00')
    ->setType('transfer');
$transactionItem2
    ->setCreditParty(['msisdn' => '+44012345678'])
    ->setDebitParty(['walletid' => '1'])
    ->setCurrency('RWF')
    ->setAmount('200.00')
    ->setType('transfer');
array_push($transactionsArray, $transactionItem1);
array_push($transactionsArray, $transactionItem2);
$batchTransaction->setTransactions($transactionsArray);

try {
    $request = Disbursement::createBatchTransaction($batchTransaction);
    prettyPrint($request->getClientCorrelationId());
    $response = $request->execute();
    prettyPrint($response);
} catch (MobileMoneyException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
