<?php

use mmpsdk\Common\Common;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Disbursement;
use mmpsdkTest\Integration\src\IntegrationTestCase;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdk\Disbursement\Process\ApproveBatchTransaction;
use mmpsdk\Disbursement\Process\RetrieveBatchTransaction;

class ViewBatchTransactionIntegrationTest extends IntegrationTestCase
{
    private static $batchTransactionRef;

    protected function getProcessInstanceType()
    {
        return RetrieveBatchTransaction::class;
    }

    protected function getResponseInstanceType()
    {
        return BatchTransaction::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
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
        $response = Disbursement::createBatchTransaction(
            $batchTransaction
        )->execute();
        self::$batchTransactionRef = Common::viewRequestState(
            $response->getServerCorrelationId()
        )
            ->execute()
            ->getObjectReference();
    }

    protected function setUp(): void
    {
        $this->request = Disbursement::viewBatchTransaction(
            self::$batchTransactionRef
        );
    }
}
