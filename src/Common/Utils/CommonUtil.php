<?php

namespace mmpsdk\Common\Utils;

use Exception;
use stdClass;

/**
 * Class CommonUtil
 * @package mmpsdk\Common\Utils
 */
class CommonUtil
{
    public static function DeserializeToSupportObject($data)
    {
        if ($data == null || !is_array($data)) {
            return null;
        }
        $supportObjArray = [];
        foreach ($data as $key => $value) {
            $supportObj = new stdClass();
            $supportObj->key = $key;
            $supportObj->value = $value;
            array_push($supportObjArray, $supportObj);
        }
        return $supportObjArray;
    }

    public static function encodeSupportObjectToString($data)
    {
        if (!is_array($data)) {
            throw new Exception('Provided value is not an array');
        }
        $stringArray = [];
        foreach ($data as $item) {
            $stringArray[] =
                urlencode($item->key) . '@' . urlencode($item->value);
        }
        return implode('$', $stringArray);
    }

    public static function validateArgument($argument, $argumentName)
    {
        if ($argument === null) {
            throw new \mmpsdk\Common\Exceptions\SDKException(
                "$argumentName cannot be null"
            );
        } elseif (gettype($argument) == 'string' && trim($argument) == '') {
            throw new \mmpsdk\Common\Exceptions\SDKException(
                "$argumentName string cannot be empty"
            );
        }
        return true;
    }
}
