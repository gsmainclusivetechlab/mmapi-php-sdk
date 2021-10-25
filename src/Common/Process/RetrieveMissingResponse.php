<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\ResponseUtil;

class RetrieveMissingResponse extends BaseProcess
{
    private $objRef;
    /**
     *  Retrieves a representation of the resource assuming that it exists.
     * @param string $clientCorrelationId
     * @return this
     */
    public function __construct($clientCorrelationId, $objRef = null)
    {
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->clientCorrelationId = $clientCorrelationId;
        $this->objRef = $objRef;
        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_RESPONSE)->setUrlParams([
            '{clientCorrelationId}' => $this->clientCorrelationId
        ]);
        $response = $this->makeRequest($request);
        $parsedResponse = $this->parseResponse($response);
        return $this->getResource($parsedResponse);
    }

    /**
     *
     * @return mixed
     */
    private function getResource($response)
    {
        $request = RequestUtil::get(
            MobileMoney::getBaseUrl() . $response->link
        );
        $response = $this->makeRequest($request);
        return $this->parseResponse($response, $this->objRef);
    }
}
