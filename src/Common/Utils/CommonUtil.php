<?php

namespace mmpsdk\Common\Utils;

use stdClass;

/**
 * Class CommonUtil
 * @package mmpsdk\Common\Utils
 */
class CommonUtil
{
    public static function DeserializeToSupportObject($data){
        $supportObjArray = array();
        foreach ($data as $key => $value) {
            $supportObj = new stdClass();
            $supportObj->key = $key;
            $supportObj->value = $value;
            array_push($supportObjArray, $supportObj);
        }
        return $supportObjArray;
    }

    public static function encodeSupportObjectToString($data){
        $stringArray = array();
        foreach ($data as $item) {
            $stringArray[] = urlencode( $item->key ) . '@' . urlencode( $item->value );
        }
        return implode('$', $stringArray);
    }
}
