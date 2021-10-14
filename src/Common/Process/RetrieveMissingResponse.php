<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\ResponseUtil;

class RetrieveMissingResponse
{
    /**
     *  Retrieves a representation of the resource assuming that it exists.
     * @param string $clientCorrelationId
     * @return RequestState|Exception
     */
    public static function execute($clientCorrelationId, $obj = null)
    {
        $response = RequestUtil::get(API::VIEW_RESPONSE)
            ->setUrlParams(['{clientCorrelationId}' => $clientCorrelationId])
            ->call();
        $link = ResponseUtil::parse($response);
        $response = RequestUtil::get(
            MobileMoney::getBaseUrl() . $link->link
        )->call();
        return ResponseUtil::parse($response, $obj);
    }
}
