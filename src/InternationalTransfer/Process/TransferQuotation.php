<?php

namespace mmpsdk\InternationalTransfer\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\InternationalTransfer\Models\Quotation;

/**
 * Class TransferQuotation
 * @package mmpsdk\InternationalTransfer\Process
 */
class TransferQuotation extends BaseProcess
{
    private $quotation;

    /**
     * Generate an authorisation code which can in turn be used at a merchant to authorise a payment.
     * Asynchronous flow is used with a final callback.
     *
     * @param Quotation $quotation
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        Quotation $quotation,
        $callBackUrl = null
    ) {
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
