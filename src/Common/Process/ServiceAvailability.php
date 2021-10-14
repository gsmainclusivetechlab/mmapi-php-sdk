<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\ResponseUtil;

class ServiceAvailability
{
    /**
     * To determine the availability of the service from the API provider.
     * @return RequestState|Exception
     */
    public static function execute()
    {
        $response = RequestUtil::get(API::HEARTBEAT)->call();
        return ResponseUtil::parse($response);
    }
}
