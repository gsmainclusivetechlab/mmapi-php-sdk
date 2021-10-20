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
     * @return Process
     */
    public static function build()
    {
        return new self(self::SYNCHRONOUS_PROCESS);
    }

    /**
     * @return RequestState
     */
    public function execute()
    {
        $response = RequestUtil::get(API::HEARTBEAT)->call();
        return ResponseUtil::parse($response);
    }
}
