<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\MerchantPayment\Validation\ReversalValidator;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\MerchantPayment\Models\Reversal;

/**
 * Class PaymentReversal
 * @package mmpsdk\MerchantPayment\Process
 */
class PaymentReversal extends BaseProcess
{
    private $transactionReference;

    private $reversal;
    /**
     * To reverse a merchant transaction in failure scenarios.
     * Asynchronous flow is used with a final callback.
     *
     * @param string $transactionReference
     * @param Reversal $reversal
     * @param string $callBackUrl
     * @return Process
     */
    public function __construct(
        $transactionReference,
        Reversal $reversal = null,
        $callBackUrl = false
    ) {
        CommonUtil::validateArgument(
            $transactionReference,
            'transactionReference'
        );
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        if ($reversal == null) {
            $this->reversal = new Reversal();
        } else {
            $this->reversal = $reversal;
        }
        $validator = new ReversalValidator($this->reversal);
        $this->transactionReference = $transactionReference;
        return $this;
    }

    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_REVERSAL,
            json_encode($this->reversal)
        )
            ->setUrlParams([
                '{transactionReference}' => $this->transactionReference
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
