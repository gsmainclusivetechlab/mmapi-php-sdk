<?php

namespace mmpsdk\Common\Exceptions;

use Exception;
use RuntimeException;
use mmpsdk\Common\Models\Error;

/**
 * SDKException creates exception which are originated from Merchant code
 *
 * Class SDKException
 * @package mmpsdk\Common\Exceptions
 */
class SDKException extends RuntimeException
{
    /** Result message when any required parameter is missing in api calling */
    public const MISSING_MANDATORY_PARAMETERS = 'Missing Mandatory Parameters',
        /** Result message when Merchant Property are not initialized */
        MISSING_PROPERTY = 'Missing property',
        /** Result message when String to object conversion failed */
        JSONSTRING_TO_OBJECT_CONVERSION_FAILED = 'JsonString to object conversion failure',
        /** Result message when object of expected type is not passed in parameter*/
        UNEXPECTED_OBJECT_PASSED_AS_PARAM = 'Object of unexpected type is passed as parameter';

    /**
     * @var string
     */
    private $rawData;

    /**
     * @var Error
     */
    private $errorObj;

    /**
     * SDKException constructor.
     * @param string $msg
     * @throws Exception
     */
    public function __construct($msg, $errorObj = null)
    {
        parent::__construct($msg);
        if (null != $errorObj) {
            $this->errorObj = $errorObj;
        }
    }

    /**
     * @return string
     */
    public function getRawdata()
    {
        return $this->rawData;
    }

    /**
     * @param string $msg
     * @param string $rawData
     * @throws Exception
     */
    public function setRawData($rawData)
    {
        $this->rawData = $rawData;
    }

    /**
     * @return Error
     */
    public function getErrorObj()
    {
        return $this->errorObj;
    }

    /**
     * @param Error $errorObj
     * @throws Exception
     */
    public function setErrorObj($errorObj)
    {
        $this->errorObj = $errorObj;
    }

    /**
     * @return SDKException when any mandatory parameter is missing
     * @throws Exception
     */
    public static function getPropertyInitializationException()
    {
        return new SDKException(self::MISSING_PROPERTY);
    }

    /**
     * @return SDKException when any mandatory parameter is missing
     * @throws Exception
     */
    public static function getMissingMandatoryParametersException()
    {
        return new SDKException(self::MISSING_MANDATORY_PARAMETERS);
    }

    /**
     * @param string $errorCategory
     * @param string $errorCode
     * @param string $errorDescription
     * @param mixed $errorParams
     * @return Error
     */
    public static function getnerateErrorObj(
        $errorCategory,
        $errorCode,
        $errorDescription,
        $errorParams
    ) {
        $errorObj = new Error();
        $errorObj->setErrorCategory($errorCategory);
        $errorObj->setErrorCode($errorCode);
        $errorObj->setErrorDescription($errorDescription);
        $errorObj->setErrorParameters($errorParams);
        return $errorObj;
    }

    /**
     * @param $exceptionMessage
     * @param $jsonObject
     * @return SDKException
     * @throws Exception
     */
    public static function getSDKException($exceptionMessage, $rawJsonResponse)
    {
        $sdkException = new SDKException($exceptionMessage);
        return $sdkException->setRawData($rawJsonResponse);
    }
}
