<?php

use mmpsdk\Common\Models\AuthorisationCode;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Process\CreateAuthorisationCode;
use mmpsdk\Common\Process\PaymentRefund;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class CreateRefundTransactionIntegrationTest extends IntegrationTestCase
{
    private static $transaction;

    protected function getProcessInstanceType()
    {
        return PaymentRefund::class;
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
            ->setAmount('160.00')
            ->setCurrency('USD')
            ->setCreditParty(['msisdn' => '+44012345678'])
            ->setDebitParty(['walletid' => '1']);
    }

    protected function setUp(): void
    {
        $this->request = MerchantPayment::createRefundTransaction(
            self::$transaction
        );
    }
}
