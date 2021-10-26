<?php

use mmpsdk\Common\Process\AccessToken;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\API;
use mmpsdkTest\src\Common\Process\ProcessTestCase;

class AccessTokenTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $this->constructorArgs = ['ABCD123', 'EFGH456'];
        $this->requestMethod = 'POST';
        $this->requestUrl = API::ACCESS_TOKEN;
        $this->requestParams = ['grant_type=client_credentials&='];
        $this->className = AccessToken::class;
        $this->requestOptions = [
            'Authorization: Basic QUJDRDEyMzpFRkdINDU2',
            'Content-Type: application/x-www-form-urlencoded'
        ];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::SYNCHRONOUS_PROCESS;
    }
}
