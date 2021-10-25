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
     * @return context
     */
    public static function build($clientCorrelationId, $objRef = null)
    {
        $context = new self(self::SYNCHRONOUS_PROCESS);
        $context->clientCorrelationId = $clientCorrelationId;
        $context->objRef = $objRef;
        return $context;
    }

    /**
     *
     * @return mixed
     */
    public function execute()
    {
        $response = RequestUtil::get(API::VIEW_RESPONSE)
            ->setUrlParams([
                '{clientCorrelationId}' => $this->clientCorrelationId
            ])
            ->call();
        $link = ResponseUtil::parse($response);
        $response = RequestUtil::get(
            MobileMoney::getBaseUrl() . $link->link
        )->call();
        return ResponseUtil::parse($response, $this->objRef);
    }
}
