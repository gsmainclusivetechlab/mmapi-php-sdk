<?php

use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\AgentService\Process\UpdateAccountIdentity;
use mmpsdkTest\Unit\src\Common\Process\ProcessTestCase;
use mmpsdk\Common\Models\PatchData;
class UpdateAccountIdentityTest extends ProcessTestCase
{
    protected function setUp(): void
    {
        $accountIdentifier = ['accountid' => '2000'];
        $identityId = '105';

        $patchRequest = new PatchData();
        $patchRequest
            ->setOp(PatchData::REPLACE)
            ->setPath('/kycVerificationStatus')
            ->setValue('verified');

        $this->constructorArgs = [
            $accountIdentifier,
            $identityId,
            [$patchRequest],
            'http://example.com/'
        ];
        $this->requestMethod = 'PATCH';
        $this->requestUrl =
            MobileMoney::getBaseUrl() .
            '/accounts/accountid/2000/identities/' .
            $identityId;
        $this->requestParams = [
            '[{"op":"replace","value":"verified","path":"/kycVerificationStatus"}]'
        ];
        $this->className = UpdateAccountIdentity::class;
        $this->requestOptions = ['X-Callback-URL: http://example.com/'];
        $this->reqObj = $this->instantiateClass(
            $this->className,
            $this->constructorArgs
        );
        $this->processType = BaseProcess::ASYNCHRONOUS_PROCESS;
    }
}
