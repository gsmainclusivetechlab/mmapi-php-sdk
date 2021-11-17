<?php
use mmpsdk\Common\Utils\CommonUtil;
use PHPUnit\Framework\TestCase;

class CommonUtilTest extends TestCase
{
    public function testDeserializeArrayToSupportObject()
    {
        $_mockArray = [
            'accountid' => 2999,
            'organisationid' => '3ab4'
        ];
        $_items = CommonUtil::DeserializeToSupportObject($_mockArray);
        $_item = $_items[0];

        $this->assertIsArray($_items, 'Should return an array');
        $this->assertCount(2, $_items, 'Should return an array of two items');
        $this->assertEquals(
            $_item->key,
            'accountid',
            'Key should be accountid'
        );
        $this->assertEquals($_item->value, 2999, 'value should be 2999');
        $this->assertIsInt(
            $_item->value,
            'value should be type of integer 2999'
        );
        $this->assertNull(
            CommonUtil::DeserializeToSupportObject(null),
            'Should return null'
        );
        $this->assertNull(
            CommonUtil::DeserializeToSupportObject('string'),
            'Should return null'
        );
    }

    public function testEncodeSupportObjectToString()
    {
        $_mockArray = [
            'accountid' => 2999,
            'organisationid' => '3ab4'
        ];
        $_multiAttrString = CommonUtil::encodeSupportObjectToString(
            $this->generateObjectArray([
                'accountid' => 2999,
                'organisationid' => '3ab4'
            ])
        );
        $_singleAttrString = CommonUtil::encodeSupportObjectToString(
            $this->generateObjectArray([
                'accountid' => 2999
            ])
        );
        $this->assertEquals(
            'accountid@2999$organisationid@3ab4',
            $_multiAttrString
        );
        $this->assertEquals('accountid/2999', $_singleAttrString);
    }

    public function generateObjectArray($array)
    {
        $_objArray = [];
        foreach ($array as $key => $value) {
            $supportObj = new stdClass();
            $supportObj->key = $key;
            $supportObj->value = $value;
            array_push($_objArray, $supportObj);
        }
        return $_objArray;
    }
}
