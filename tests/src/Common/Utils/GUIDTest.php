<?php
use mmpsdk\Common\Utils\GUID;
use PHPUnit\Framework\TestCase;

class GUIDTest extends TestCase
{
    public function testCheckIfGuidIsValid()
    {
        $guid = GUID::create();
        $this->assertMatchesRegularExpression(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/',
            $guid,
            'Must be a valid guid'
        );
    }
}
