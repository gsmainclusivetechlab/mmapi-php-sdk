<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Models\Transaction;
use mmpsdk\Disbursement\Process\InitiateDisbursement;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class InitiateDisbursementTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $disbursementTransaction = new Transaction();
        $disbursementTransaction
            ->setAmount('200.00')
            ->setCurrency('RWF')
            ->setCreditParty(['accountid' => '2999'])
            ->setDebitParty(['accountid' => '2999']);
        $this->constructorArgs = [
            $disbursementTransaction,
            'http://example.com/'
        ];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/transactions/type/disbursement';
        $this->requestParams = [
            '{"amount":"200.00","currency":"RWF","creditParty":[{"key":"accountid","value":"2999"}],"debitParty":[{"key":"accountid","value":"2999"}]}'
        ];
        $this->className = InitiateDisbursement::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
