<?php

use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Process\AccountBalance;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Models\Balance;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class AccountBalanceTest extends ProcessTestCase
{
    private $accountIdentifier = [
        'accountid' => 2000
    ];
    private $filter = [
        'limit' => 2
    ];

    protected function setUp(): void
    {
        $this->constructorArgs = [$this->accountIdentifier, $this->filter];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/accounts/accountid/2000/balance?limit=2';
        $this->className = AccountBalance::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
        $this->mockResponseObject = 'Balance.json';
        $this->responseType = Balance::class;
    }
}
