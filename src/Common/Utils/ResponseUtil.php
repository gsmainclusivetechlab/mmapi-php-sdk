<?php

namespace mmpsdk\Common\Utils;

use Exception;
use mmpsdk\Common\Models\Error;
use mmpsdk\Common\Exceptions\SDKException;

/**
 * Class ResponseUtil
 * @package mmpsdk\Common\Utils
 */
class ResponseUtil
{
    private const
        OK = 200,
        CREATED = 201,
        ACCEPTED = 202,
        BAD_REQUEST = 400,
        UNAUTHORIZED = 401,
        NOT_FOUND = 404,
        INTERNAL_SERVER_ERROR = 500,
        SERVICE_UNAVAILABLE = 503;

    /**
     * Parse the response
     * @param mixed $response
     * @return mixed|null $obj
     */
    public static function parse($response, $obj = null)
    {
        switch ($response->httpCode) {
            //Success Responses
            case self::OK:
            case self::ACCEPTED:
            case self::CREATED:
                $decodedResponse = json_decode($response->result);
                if ($response->clientCorrelationId) {
                    $decodedResponse->clientCorrelationId = $response->clientCorrelationId;
                }
                if ($obj !== null) {
                    if(is_array($decodedResponse) && !empty($decodedResponse)){
                        $objectArray = array();
                        foreach($decodedResponse as $item){
                            $object = clone $obj;
                            array_push($objectArray, $object->hydrate($item));
                        }
                        return $objectArray;
                    }
                    return $obj->hydrate($decodedResponse);
                } else {
                    return $decodedResponse;
                }
                break;

            //Failed Responses
            case self::BAD_REQUEST:
                $errorObject = new Error(json_decode($response->result));
                throw new SDKException(self::BAD_REQUEST, $errorObject);
                // return $errorObject;
                break;
            case self::UNAUTHORIZED:
                $errorObject = json_decode($response->result);
                if (isset($errorObject->errorCode)) {
                    throw new SDKException(self::UNAUTHORIZED, new Error($errorObject));
                } else {
                    $authObj = AuthUtil::updateAccessToken();
                    self::parse($response->requestObj->call(), $obj);
                }
                // throw new Exception('Authorisation Failed: ' . $response->result);

                break;
            case self::NOT_FOUND:
                $errorObject = json_decode($response->result);
                if(isset($errorObject->errorCode))
                    throw new SDKException(self::NOT_FOUND, new Error($errorObject));
                else
                    throw new SDKException('Resource Not Found');
                break;
            case self::INTERNAL_SERVER_ERROR:
                throw new SDKException('Internal Server Error');
                break;
            case self::SERVICE_UNAVAILABLE:
                throw new SDKException('Service Unavailable');
                break;
            default:
                throw new SDKException('Unknown Response', $response);
        }
    }
}
