<?php
use mmpsdk\Common\Utils\AuthUtil;
use mmpsdk\Common\Models\AuthToken;
use mmpsdk\Common\Constants\MobileMoney;
use PHPUnit\Framework\TestCase;

use src\TestConfig;

class AuthUtilTest extends TestCase
{

    private $authToken;

    protected function setUp(): void
    {
        $_authToken = new AuthToken();
        $_authToken->setAuthToken('123345');
        $_authToken->setCreatedAt(time());
        $_authToken->setExpiresIn(3600);
        $this->authToken = $_authToken;
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

    public static function testGenerateAccessToken()
    {
        print_r(TestConfig::CONSUMER_KEY);
    }
}
