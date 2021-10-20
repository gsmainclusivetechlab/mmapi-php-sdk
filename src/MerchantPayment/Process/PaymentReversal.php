<?php

namespace mmpsdk\MerchantPayment\Process;

use Exception;
use mmpsdk\MerchantPayment\Validation\ReversalValidator;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Utils\ResponseUtil;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\MerchantPayment\Enums\TransactionType;
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
    public static function build(
        $transactionReference,
        Reversal $reversal = null,
        $callBackUrl = null
    ) {
        $validator = new ReversalValidator($reversal);
        $context = new self(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        if ($reversal == null) {
            $context->reversal = new Reversal();
        } else {
            $context->reversal = $reversal;
        }
        $context->transactionReference = $transactionReference;
        return $context;
    }

    public function execute()
    {
        $response = RequestUtil::post(
            API::CREATE_REVERSAL,
            json_encode($this->reversal)
        )
            ->setUrlParams([
                '{transactionReference}' => $this->transactionReference
            ])
            ->setClientCorrelationId(true)
            ->httpHeader(
                Header::X_CALLBACK_URL,
                $this->callBackUrl
                    ? $this->callBackUrl
                    : MobileMoney::getCallbackUrl()
            )
            ->call();

        return ResponseUtil::parse($response, new RequestState());
    }
}
