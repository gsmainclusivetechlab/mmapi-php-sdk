<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Models\Quotation;

/**
 * Class TransferQuotation
 * @package mmpsdk\Common\Process
 */
class TransferQuotation extends BaseProcess
{
    private $quotation;

    /**
     * Request an international quotation.
     * Asynchronous flow is used with a final callback.
     *
     * @param Quotation $quotation
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(Quotation $quotation, $callBackUrl = null)
    {
        CommonUtil::validateArgument($quotation, 'quotation');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->quotation = $quotation;
        return $this;
    }

    /**
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_QUOTATION,
            json_encode($this->quotation)
        )
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
