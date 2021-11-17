<?php

namespace mmpsdk\Common\Utils;

use stdClass;

/**
 * Class CommonUtil
 * @package mmpsdk\Common\Utils
 */
class CommonUtil
{
    const TYPE_STRING = 'string',
        TYPE_OBJECT = 'object',
        TYPE_ARRAY = 'array';

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
            throw new \mmpsdk\Common\Exceptions\SDKException(
                'Array required ' . gettype($data) . ' given.'
            );
        }
        $stringArray = [];
        $seperator = count($data) == 1 ? '/' : '@';
        foreach ($data as $item) {
            $stringArray[] =
                urlencode($item->key) . $seperator . urlencode($item->value);
        }
        return implode('$', $stringArray);
    }

    public static function validateArgument(
        $argument,
        $argumentName,
        $requiredType = null
    ) {
        if ($requiredType && $requiredType !== gettype($argument)) {
            throw new \mmpsdk\Common\Exceptions\SDKException(
                "$argumentName: $requiredType required " .
                    gettype($argument) .
                    ' given.'
            );
        } elseif ($argument === null) {
            throw new \mmpsdk\Common\Exceptions\SDKException(
                "$argumentName cannot be null"
            );
        } elseif (gettype($argument) == 'string' && trim($argument) == '') {
            throw new \mmpsdk\Common\Exceptions\SDKException(
                "$argumentName string cannot be empty"
            );
        } elseif (
            gettype($argument) == 'array' &&
            (in_array(null, $argument, true) || in_array('', $argument, true))
        ) {
            throw new \mmpsdk\Common\Exceptions\SDKException(
                "$argumentName cannot contain null or empty string"
            );
        }
        return true;
    }
}
