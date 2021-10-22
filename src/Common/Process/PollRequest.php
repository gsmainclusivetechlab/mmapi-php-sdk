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
     * @return RequestState|Exception
     */
    public static function build($serverCorrelationId)
    {
        $context = new self(self::SYNCHRONOUS_PROCESS);
        $context->serverCorrelationId = $serverCorrelationId;
    }

    /**
     *
     * @return RequestState
     */
    public function execute()
    {
        $response = RequestUtil::get(API::VIEW_REQUEST_STATE)
            ->setUrlParams([
                '{serverCorrelationId}' => $this->serverCorrelationId
            ])
            ->call();
        return ResponseUtil::parse($response, new RequestState());
    }
}
