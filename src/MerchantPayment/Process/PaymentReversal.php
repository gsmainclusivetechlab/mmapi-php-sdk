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
use mmpsdk\MerchantPayment\Enums\TransactionType;
use mmpsdk\MerchantPayment\Models\Reversal;

/**
 * Class PaymentReversal
 * @package mmpsdk\MerchantPayment\Process
 */
class PaymentReversal
{
    /**
     * To reverse a merchant transaction in failure scenarios.
     * Asynchronous flow is used with a final callback.
     *
     * @param string $transactionReference
     * @param Reversal $reversal
     * @param string $callBackUrl
     * @return RequestState|Exception
     */
    public static function execute($transactionReference, Reversal $reversal = null, $callBackUrl = null)
    {
        if ($reversal == null) {
            $reversal = new Reversal();
        }
        //Validation
        $validator = new ReversalValidator($reversal);

        //Make API call
        $response = RequestUtil::post(API::CREATE_REVERSAL, json_encode($reversal))
                        ->setUrlParams(['{transactionReference}' => $transactionReference])
                        ->setClientCorrelationId(true)
                        ->httpHeader(Header::X_CALLBACK_URL, $callBackUrl ? $callBackUrl : MobileMoney::getCallbackUrl())
                        ->call();

        return ResponseUtil::parse($response, new RequestState());
    }
}
