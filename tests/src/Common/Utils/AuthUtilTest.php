<?php
use mmpsdk\Common\Utils\AuthUtil;
use mmpsdk\Common\Models\AuthToken;
use mmpsdk\Common\Constants\MobileMoney;
use PHPUnit\Framework\TestCase;

class AuthUtilTest extends TestCase
{
    public function testCheckIfTokenIsExpired()
    {
        $_authToken = new AuthToken();
        $_authToken->setAuthToken('123345');
        $_authToken->setCreatedAt(time());
        $_authToken->setExpiresIn(3600);

        $result = AuthUtil::checkExpiredToken($_authToken);

        $this->assertIsBool($result, 'Should return boolean');
        $this->assertFalse($result, 'Should return false');

        $_authToken->setCreatedAt(time() - 3600);
        $result = AuthUtil::checkExpiredToken($_authToken);
        $this->assertNotFalse($result, 'Should return true');
    }

    public static function testGetAccessTokenFromMemory()
    {
    }
}
