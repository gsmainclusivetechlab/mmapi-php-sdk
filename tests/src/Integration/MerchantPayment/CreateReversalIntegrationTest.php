<?php

use mmpsdk\Common\Common;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Process\TransactionReversal;
use mmpsdk\MerchantPayment\MerchantPayment;
use mmpsdkTest\src\Integration\IntegrationTestCase;

class CreateReversalIntegrationTest extends IntegrationTestCase
{
    private static $transactionReference;

    protected function getProcessInstanceType()
    {
        return TransactionReversal::class;
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
        $transaction = new Transaction();
        $transaction
            ->setAmount('160.00')
            ->setCurrency('USD')
            ->setCreditParty(['msisdn' => '+44012345678'])
            ->setDebitParty(['walletid' => '1']);
        $response = MerchantPayment::createMerchantTransaction(
            $transaction
        )->execute();
        self::$transactionReference = Common::viewRequestState(
            $response->getServerCorrelationId()
        )
            ->execute()
            ->getObjectReference();
    }

    protected function setUp(): void
    {
        $this->request = MerchantPayment::createReversal(
            self::$transactionReference
        );
    }
}
