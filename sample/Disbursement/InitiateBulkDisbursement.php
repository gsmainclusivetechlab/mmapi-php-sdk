<?php
require_once __DIR__ . './../bootstrap.php';
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdk\Disbursement\Models\DisbursementTransaction;
use mmpsdk\Disbursement\Process\InitiateBulkDisbursement;

$batchTransaction = new BatchTransaction();
        $batchTransaction
            ->setBatchTitle('Batch_Test')
            ->setBatchDescription('Testing a Batch')
            ->setScheduledStartDate('2019-12-11T15:08:03.158Z');

        $transactionsArray = [];
        $transactionItem1 = new DisbursementTransaction();
        $transactionItem2 = new DisbursementTransaction();
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
    $request = new InitiateBulkDisbursement($batchTransaction);
    prettyPrint($request->getClientCorrelationId());
    $repsonse = $request->execute();
    prettyPrint($repsonse);
} catch (SDKException $ex) {
    prettyPrint($ex->getMessage());
    prettyPrint($ex->getErrorObj());
}
