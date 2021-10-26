<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\ResponseUtil;

class PollRequest extends BaseProcess
{
    protected $serverCorrelationId;
    /**
     * Retrieves the state of a request for a given Server Correlation Id.
     * @param string $serverCorrelationId
     * @return this
     */
    public function __construct($serverCorrelationId)
    {
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->serverCorrelationId = $serverCorrelationId;
        return $this;
    }

    /**
     *
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_REQUEST_STATE)
            ->setUrlParams([
                '{serverCorrelationId}' => $this->serverCorrelationId
            ])
            ->build();
        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
