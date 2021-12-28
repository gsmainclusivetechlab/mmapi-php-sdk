<?php

use mmpsdk\Common\Common;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Disbursement;
use mmpsdkTest\src\Integration\IntegrationTestCase;
use mmpsdk\Disbursement\Models\BatchTransaction;
use mmpsdk\Disbursement\Process\ApproveBatchTransaction;
use mmpsdk\Common\Models\PatchData;

class UpdateBatchTransactionIntegrationTest extends IntegrationTestCase
{
    private static $batchTransactionRef;

    private static $patchData;

    protected function getProcessInstanceType()
    {
        return ApproveBatchTransaction::class;
    }

    protected function getResponseInstanceType()
    {
        return RequestState::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::ASYNCHRONOUS_PROCESS;
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
        $response = Disbursement::createBatchTransaction(
            $batchTransaction
        )->execute();
        self::$batchTransactionRef = Common::viewRequestState(
            $response->getServerCorrelationId()
        )
            ->execute()
            ->getObjectReference();
        $patchRequest = new PatchData();
        $patchRequest
            ->setOp(PatchData::REPLACE)
            ->setPath('/batchStatus')
            ->setValue('approved');
        self::$patchData = [$patchRequest];

    }

    protected function setUp(): void
    {
        $this->request = Disbursement::updateBatchTransaction(
            self::$patchData,
            self::$batchTransactionRef
        );
    }
}
