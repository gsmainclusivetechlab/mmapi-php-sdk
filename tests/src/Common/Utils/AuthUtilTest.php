<?php

use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Utils\AuthUtil;
use mmpsdk\Common\Models\AuthToken;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Enums\SecurityLevel;
use mmpsdk\Common\Utils\RequestUtil;
use PHPUnit\Framework\TestCase;

use src\TestConfig;

class AuthUtilTest extends TestCase
{
    private $authToken;

    private $requestObj;

    protected function setUp(): void
    {
        MobileMoney::setSecurityLevel(SecurityLevel::DEVELOPMENT);
        $this->requestObj = RequestUtil::post('http://example.com');
        $_authToken = new AuthToken();
        $_authToken->setAuthToken('123345');
        $_authToken->setCreatedAt(time());
        $_authToken->setExpiresIn(3600);
        $this->authToken = $_authToken;
    }

    protected function tearDown(): void
    {
        MobileMoney::setSecurityLevel(SecurityLevel::DEVELOPMENT);
    }

    public function testCheckIfTokenIsExpired()
    {
        $result = AuthUtil::checkExpiredToken($this->authToken);

        $this->assertIsBool($result, 'Should return boolean');
        $this->assertFalse($result, 'Should return false');

        $this->authToken->setCreatedAt(time() - 3600);
        $result = AuthUtil::checkExpiredToken($this->authToken);
        $this->assertNotFalse($result, 'Should return true');
    }

    public function testCheckIfCorrectHeadersAreGeneratedForDevelopmentLevel()
    {
        $request = AuthUtil::buildHeader($this->requestObj);

        $optionsArray = $request->getOptions();

        $this->assertArrayHasKey(
            CURLOPT_HTTPHEADER,
            $optionsArray,
            'Should have Headers'
        );

        $httpHeadersArray = $this->parseHeaders(
            $optionsArray[CURLOPT_HTTPHEADER]
        );
        $this->assertArrayHasKey(
            Header::X_API_KEY,
            $httpHeadersArray,
            'Should have X-API-Key in Header'
        );

        $this->assertEquals(
            MobileMoney::getApiKey(),
            $httpHeadersArray[Header::X_API_KEY],
            'Should have API key as value'
        );

        $this->assertArrayHasKey(
            Header::AUTHORIZATION,
            $httpHeadersArray,
            'Should have Authorization in Header'
        );

        $this->assertEquals(
            'Basic ' .
                base64_encode(
                    MobileMoney::getConsumerKey() .
                        ':' .
                        MobileMoney::getConsumerSecret()
                ),
            $httpHeadersArray[Header::AUTHORIZATION],
            'The value of authorisation header should be encoded API Client
            credentials (client_id, client_secret)'
        );
    }

    public function testCheckIfCorrectHeadersAreGeneratedForStandardLevel()
    {
        MobileMoney::setSecurityLevel(SecurityLevel::STANDARD);

        $request = AuthUtil::buildHeader($this->requestObj);

        $optionsArray = $request->getOptions();

        $this->assertArrayHasKey(
            CURLOPT_HTTPHEADER,
            $optionsArray,
            'Should have Headers'
        );

        $httpHeadersArray = $this->parseHeaders(
            $optionsArray[CURLOPT_HTTPHEADER]
        );
        $this->assertArrayHasKey(
            Header::X_API_KEY,
            $httpHeadersArray,
            'Should have X-API-Key in Header'
        );

        $this->assertEquals(
            MobileMoney::getApiKey(),
            $httpHeadersArray[Header::X_API_KEY],
            'Should have API key as value'
        );

        $this->assertArrayHasKey(
            Header::AUTHORIZATION,
            $httpHeadersArray,
            'Should have Authorization in Header'
        );

        $this->assertTrue(
            is_string($httpHeadersArray[Header::AUTHORIZATION]) &&
                strlen($httpHeadersArray[Header::AUTHORIZATION]) > 10,
            'Should be a string.'
        );
    }

    private function parseHeaders($array)
    {
        $keys = [];
        foreach ($array as $string) {
            list($before, $after) = explode(':', $string, 2);
            $keys += [trim($before) => trim($after)];
        }
        return $keys;
    }
}
