<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\AgentService\Process\RetrieveAccount;

class RetrieveAccountTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $this->constructorArgs = [['accountid' => '2000']];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/accounts/accountid/2000';
        $this->className = RetrieveAccount::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
    }
}
