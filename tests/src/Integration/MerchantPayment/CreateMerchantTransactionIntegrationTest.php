<?php

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Process\InitiateMerchantTransaction;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class CreateMerchantTransactionIntegrationTest extends IntegrationTestCase
{
    private static $transaction;

    protected function getProcessInstanceType()
    {
        return InitiateMerchantTransaction::class;
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
        $this->request = MerchantPayment::createMerchantTransaction(
            self::$transaction
        );
    }
}
