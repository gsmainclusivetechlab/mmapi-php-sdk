<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\ServiceAvailability as HeartBeat;

/**
 * Class ServiceAvailability
 * @package mmpsdk\Common\Process
 */
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
     * @return HeartBeat
     */
    public function execute()
    {
        $request = RequestUtil::get(API::HEARTBEAT)->build();
        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new HeartBeat());
    }
}
