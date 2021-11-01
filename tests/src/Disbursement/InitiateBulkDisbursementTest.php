<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdk\Disbursement\Models\DisbursementTransaction;
use mmpsdk\Disbursement\Process\InitiateBulkDisbursement;
use mmpsdk\Disbursement\Process\InitiateDisbursement;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class InitiateBulkDisbursementTest extends ProcessTestCase
{
    protected function setUp(): void
    {
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

        $this->constructorArgs = [$batchTransaction, 'http://example.com/'];
        $this->requestMethod = 'POST';
        $this->requestUrl = MobileMoney::getBaseUrl() . '/batchtransactions';
        $this->requestParams = [
            '{"transactions":[{"amount":"200.00","currency":"RWF","creditParty":[{"key":"accountid","value":"2000"}],"debitParty":[{"key":"accountid","value":"2999"}],"type":"transfer"},{"amount":"200.00","currency":"RWF","creditParty":[{"key":"accountid","value":"2999"}],"debitParty":[{"key":"accountid","value":"2000"}],"type":"transfer"}],"batchTitle":"Batch_Test","batchDescription":"Testing a Batch","scheduledStartDate":"2019-12-11T15:08:03.158Z"}'
        ];
        $this->className = InitiateBulkDisbursement::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
