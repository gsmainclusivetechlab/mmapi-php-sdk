<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdkTest\src\Common\Process\ProcessTestCase;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;
use mmpsdk\MerchantPayment\Process\CreateAuthorisationCode;

class CreateAuthorisationCodeTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $authorisationObj = new AuthorisationCode();
        $authorisationObj
            ->setRequestDate('2021-10-27T08:56:26.40299')
            ->setCurrency('GBP')
            ->setAmount('1001.00');
        $accountIdentifier = [
            'accountid' => 2000
        ];
        $this->constructorArgs = [
            $accountIdentifier,
            $authorisationObj,
            'http://example.com/'
        ];
        $this->requestMethod = 'POST';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/accounts/accountid/2000/authorisationcodes';
        $this->requestParams = [
            '{"amount":"1001.00","currency":"GBP","requestDate":"2021-10-27T08:56:26.40299"}'
        ];
        $this->className = CreateAuthorisationCode::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
