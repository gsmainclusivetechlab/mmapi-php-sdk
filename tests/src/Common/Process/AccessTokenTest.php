<?php

use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Models\AuthToken;
use mmpsdk\Common\Process\AccessToken;
use PHPUnit\Framework\TestCase;
use mmpsdkTest\Extensions\PropertyAccessor;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\RequestUtil;

class AccessTokenTest extends TestCase
{
    public function testBuildProcess()
    {
        $reqObj = new AccessToken(
            MobileMoney::getConsumerKey(),
            MobileMoney::getConsumerSecret()
        );
        $consumerKey = PropertyAccessor::getProperty(
            AccessToken::class,
            'consumerKey'
        );
        $secretKey = PropertyAccessor::getProperty(
            AccessToken::class,
            'secretKey'
        );
        $this->assertInstanceOf(
            AccessToken::class,
            $reqObj,
            'Should be of type AccessToken'
        );
        $this->assertEquals(
            BaseProcess::SYNCHRONOUS_PROCESS,
            $reqObj->getProcessType(),
            'Should be synchronous process'
        );
        $this->assertEquals(
            MobileMoney::getConsumerKey(),
            $consumerKey->getValue($reqObj),
            'Value should be same as passed'
        );
        $this->assertEquals(
            MobileMoney::getConsumerSecret(),
            $secretKey->getValue($reqObj),
            'Value should be same as passed'
        );
    }

    // public function testExecuteRequest()
    // {
    //     $mockAccessToken = Mock_AccessToken::build(
    //         MobileMoney::getConsumerKey(),
    //         MobileMoney::getConsumerSecret()
    //     );
    //     $mockAccessToken->test = $this;
    //     $response = $mockAccessToken->execute();
    //     var_dump($response);
    // }
}

class Mock_AccessToken extends AccessToken
{
    /** \PHPUnit\Framework\TestCase */
    public $test;

    protected function makeRequest($request)
    {
        return null;
    }
}
