<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Process\InitiateMerchantTransaction;

class InitiateMerchantTransactionTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $transaction = new Transaction();
        $transaction
            ->setAmount('200.00')
            ->setCurrency('RWF')
            ->setCreditParty(['accountid' => '2999'])
            ->setDebitParty(['accountid' => '2999']);
        $this->constructorArgs = [$transaction, 'http://example.com/'];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/transactions/type/merchantpay';
        $this->requestParams = [
            '{"amount":"200.00","currency":"RWF","creditParty":[{"key":"accountid","value":"2999"}],"debitParty":[{"key":"accountid","value":"2999"}]}'
        ];
        $this->className = InitiateMerchantTransaction::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
