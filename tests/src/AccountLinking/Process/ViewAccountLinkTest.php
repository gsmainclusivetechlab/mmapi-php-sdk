<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\AccountLinking\Models\Link;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\AccountLinking\Process\ViewAccountLink;

class ViewAccountLinkTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $this->constructorArgs = [['accountid' => '2000'], 'REF123'];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() . '/accounts/accountid/2000/links/REF123';
        $this->className = ViewAccountLink::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
        $this->mockResponseObject = 'Link.json';
        $this->responseType = Link::class;
    }
}
