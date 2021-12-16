<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\RetrieveTransaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\InternationalTransfer\InternationalTransfer;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class ViewTransactionIntegrationTest extends IntegrationTestCase
{
    private static $transactionReference;

    protected function getProcessInstanceType()
    {
        return RetrieveTransaction::class;
    }

    protected function getResponseInstanceType()
    {
        return Transaction::class;
    }

    protected function getRequestType()
    {
        return BaseProcess::SYNCHRONOUS_PROCESS;
    }

    public static function setUpBeforeClass(): void
    {
        $transaction = new Transaction();
        $transaction
            ->setAmount('160.00')
            ->setCurrency('USD')
            ->setCreditParty(['msisdn' => '+44012345678'])
            ->setDebitParty(['walletid' => '1']);
        $response = InternationalTransfer::createInternationalTransaction(
            $transaction
        )->execute();
        self::$transactionReference = InternationalTransfer::viewRequestState(
            $response->getServerCorrelationId()
        )
            ->execute()
            ->getObjectReference();
    }

    protected function setUp(): void
    {
        $this->request = InternationalTransfer::viewTransaction(
            self::$transactionReference
        );
    }
}
