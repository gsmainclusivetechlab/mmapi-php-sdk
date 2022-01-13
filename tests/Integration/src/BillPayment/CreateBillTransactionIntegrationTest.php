<?php

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\BillPayment\Process\InitiateBillTransaction;
use mmpsdk\BillPayment\BillPayment;
use mmpsdkTest\Integration\src\IntegrationTestCase;

class CreateBillTransactionIntegrationTest extends IntegrationTestCase
{
    private static $transaction;

    protected function getProcessInstanceType()
    {
        return InitiateBillTransaction::class;
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
        $this->request = BillPayment::createBillTransaction(self::$transaction);
    }
}
