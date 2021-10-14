<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\ResponseUtil;

class PollRequest
{
    /**
     * Retrieves the state of a request for a given Server Correlation Id.
     * @param string $serverCorrelationId
     * @return RequestState|Exception
     */
    public static function execute($serverCorrelationId)
    {
        $response = RequestUtil::get(API::VIEW_REQUEST_STATE)
            ->setUrlParams(['{serverCorrelationId}' => $serverCorrelationId])
            ->call();
        return ResponseUtil::parse($response, new RequestState());
    }
}
