<?php

namespace mmpsdk\Common\Utils;

use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Models\Error;
use mmpsdk\Common\Exceptions\SDKException;
use mmpsdk\Common\Constants\MobileMoney;

/**
 * Class ResponseUtil
 * @package mmpsdk\Common\Utils
 */
class ResponseUtil
{
    const OK = 200,
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
    public static function parse($response, $obj = null, $request)
    {
        switch ($response->getHttpCode()) {
            //Success Responses
            case self::OK:
            case self::ACCEPTED:
            case self::CREATED:
                $decodedResponse = json_decode($response->getResult());
                if (is_array($decodedResponse) && empty($decodedResponse)) {
                    return $decodedResponse;
                }
                //Add client correlation id along with response
                $data = $decodedResponse;
                if ($response->getClientCorrelationId()) {
                    $data->clientCorrelationId = $response->getClientCorrelationId();
                }
                if ($obj !== null) {
                    $count = 0;
                    if (
                        $response->getHeaders() !== null &&
                        array_key_exists(
                            Header::X_RECORDS_AVAILABLE_COUNT,
                            $response->getHeaders()
                        )
                    ) {
                        $count = $response->getHeaders()[
                            Header::X_RECORDS_AVAILABLE_COUNT
                        ];
                    }
                    $data = $obj->hydrate($decodedResponse, null, $count);
                }
                return $data;
                break;

            //Failed Responses
            case self::BAD_REQUEST:
                $errorObject = new Error($response->getResult());
                throw new SDKException(
                    self::BAD_REQUEST .
                        ': ' .
                        $errorObject->getErrorDescription(),
                    $errorObject
                );
                break;
            case self::UNAUTHORIZED:
                $errorObject = json_decode($response->getResult());
                if (isset($errorObject->errorCode)) {
                    throw new SDKException(
                        self::UNAUTHORIZED,
                        new Error($response->getResult())
                    );
                } else {
                    if (!isset($request->isAuthTokenRequest)) {
                        print_r('Refreshing Token...');
                        $authObj = AuthUtil::updateAccessToken(
                            MobileMoney::getConsumerKey(),
                            MobileMoney::getConsumerSecret(),
                            MobileMoney::getApiKey()
                        );
                    }
                    $request->retryCount += 1;
                    if ($request->retryCount <= $request->retryLimit) {
                        return $request->execute();
                    } else {
                        throw new SDKException(
                            SDKException::MAX_RETRIES_EXCEEDED
                        );
                    }
                }
                break;

            case self::NOT_FOUND:
                $errorObject = json_decode($response->getResult());
                if (isset($errorObject->errorCode)) {
                    $errObj = new Error($response->getResult());
                    throw new SDKException(
                        self::NOT_FOUND . ': ' . $errObj->getErrorDescription(),
                        $errObj
                    );
                } else {
                    throw new SDKException('Resource Not Found');
                }
                break;
            case self::INTERNAL_SERVER_ERROR:
                throw new SDKException('Internal Server Error');
                break;
            case self::SERVICE_UNAVAILABLE:
                throw new SDKException('Service Unavailable');
                break;
            default:
                throw new SDKException(
                    'Unknown Response: ' .
                        $response->getHttpCode() .
                        $response->getResult()
                );
        }
    }
}
