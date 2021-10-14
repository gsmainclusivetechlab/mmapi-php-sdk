<?php

namespace mmpsdk\MerchantPayment\Process;

use Exception;
use mmpsdk\MerchantPayment\Models\MerchantTransaction;
use mmpsdk\MerchantPayment\Validation\TransactionValidator;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\ResponseUtil;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;

/**
 * Class PayeeInitiated
 * @package mmpsdk\MerchantPayment\Process
 */
class PayeeInitiated
{
    /**
     * The merchant initiates the request and will be credited when the payer approves the request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param MerchantTransaction $merchantTransaction
     * @param string $callBackUrl
     * @return RequestState|Exception
     */
    public static function execute(MerchantTransaction $merchantTransaction, $callBackUrl = null)
    {
        //Validation
        $validator = new TransactionValidator($merchantTransaction);

        //Make API call
        $response = RequestUtil::post(API::CREATE_TRANSACTION, json_encode($merchantTransaction))
                        ->setUrlParams(['{transactionType}' => $merchantTransaction->getType()])
                        ->setClientCorrelationId(true)
                        ->httpHeader(Header::X_CALLBACK_URL, $callBackUrl ? $callBackUrl : MobileMoney::getCallbackUrl())
                        ->call();

        return ResponseUtil::parse($response, new RequestState());
    }
}
