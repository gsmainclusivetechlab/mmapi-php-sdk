<?php

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Disbursement;
use mmpsdkTest\Integration\src\IntegrationTestCase;
use mmpsdk\Disbursement\Process\InitiateDisbursement;

class CreateDisbursementTransactionIntegrationTest extends IntegrationTestCase
{
    private static $transaction;

    protected function getProcessInstanceType()
    {
        return InitiateDisbursement::class;
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
            ->setAmount('36.00')
            ->setCurrency('USD')
            ->setCreditParty(['walletid' => '1'])
            ->setDebitParty(['msisdn' => '+44012345678']);
    }

    protected function setUp(): void
    {
        $this->request = Disbursement::createDisbursementTransaction(
            self::$transaction
        );
    }
}
