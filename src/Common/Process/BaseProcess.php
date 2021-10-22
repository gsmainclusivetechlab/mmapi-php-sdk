<?php

namespace mmpsdk\Common\Process;

use Exception;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Utils\GUID;

abstract class BaseProcess
{
    /**
     * The final resource is always provided in response to an API request.
     * There is no interim response.
     */
    public const SYNCHRONOUS_PROCESS = 1;

    /**
     * Interim response is always provided in response to an API request in the form of a Request State object.
     * The final response is provided via a callback or alternatively can be accessed via polling on Request State.
     */
    public const ASYNCHRONOUS_PROCESS = 2;

    /**
     * UUID that enables the client to correlate the API request
     * with the resource created/updated by the provider.
     *
     * @var string
     */
    protected $clientCorrelationId;

    /**
     * String containing the URL which should receive the Callback.
     * For asynchronous requests.
     *
     * @var string
     */
    protected $callBackUrl;

    /**
     * Standardised flow pattern type followed by the APIs.
     *
     * @var int
     */
    protected $processType = self::SYNCHRONOUS_PROCESS;

    public function __construct($processType, $callBackUrl = null)
    {
        $this->processType = $processType;
        if ($this->processType == self::ASYNCHRONOUS_PROCESS) {
            $this->clientCorrelationId = GUID::create();
            if (is_bool($callBackUrl) || is_string($callBackUrl)) {
                $this->callBackUrl = $callBackUrl
                ? $callBackUrl
                : MobileMoney::getCallbackUrl();
            }
        }
    }

    /**
     * Retrieve the client correlation id generated for the request
     *
     * @return string
     */
    public function getClientCorrelationId()
    {
        return $this->clientCorrelationId;
    }

    /**
     * Retrieve the callback URL
     *
     * @return string
     */
    public function getCallBackUrl()
    {
        return $this->callBackUrl;
    }

    /**
     * Execute the request
     *
     * @return mixed
     */
    abstract public function execute();
}
