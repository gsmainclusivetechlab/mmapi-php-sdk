<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\Common\Process\ViewAuthorisationCode;
use mmpsdk\Common\Models\AuthorisationCode;

class ViewAuthorisationCodeTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $this->constructorArgs = [['accountid' => '2000'], 'REF123'];
        $this->requestMethod = 'GET';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/accounts/accountid/2000/authorisationcodes/REF123';
        $this->className = ViewAuthorisationCode::class;
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
        $this->mockResponseObject = 'AuthorisationCode.json';
        $this->responseType = AuthorisationCode::class;
    }
}
