<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\Common\Process\RetrieveAccountTransactions;
use mmpsdk\Common\Models\Transaction;

class RetrieveAccountTransactionsTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $this->constructorArgs = [
            ['accountid' => '2000'],
            [
                'offset' => 0,
                'limit' => 10
            ]
        ];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/accounts/accountid/2000/transactions?offset=0&limit=10';
        $this->className = RetrieveAccountTransactions::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
        $this->mockResponseObject = 'Transaction.json';
        $this->responseType = Transaction::class;
    }
}
