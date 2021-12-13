<?php

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Process\InitiateTransferTransaction;
use mmpsdk\P2PTransfer\P2PTransfer;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class CreateTransferTransactionIntegrationTest extends IntegrationTestCase
{
    private static $transaction;

    protected function getProcessInstanceType()
    {
        return InitiateTransferTransaction::class;
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
        self::$transaction = new Transaction();
        self::$transaction
            ->setAmount('16.00')
            ->setCurrency('USD')
            ->setCreditParty(['walletid' => '1'])
            ->setDebitParty(['msisdn' => '+44012345678']);
    }

    protected function setUp(): void
    {
        $this->request = P2PTransfer::createTransferTransaction(
            self::$transaction
        );
    }
}
