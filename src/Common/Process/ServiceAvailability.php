<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\ResponseUtil;

class ServiceAvailability extends BaseProcess
{
    /**
     * To determine the availability of the service from the API provider.
     * @return this
     */
    public function __construct()
    {
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        return $this;
    }

    /**
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::get(API::HEARTBEAT);
        $response = $this->makeRequest($request);
        return $this->parseResponse($response);
    }
}
