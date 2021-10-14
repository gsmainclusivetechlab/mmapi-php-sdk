<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\ResponseUtil;
use mmpsdk\MerchantPayment\Models\MerchantTransaction;

class PollRequest
{
    /**
     * Retrieves the transaction object by reference id.
     * @param string $transactionReference
     * @return MerchantTransaction|Exception
     */
    public static function execute($transactionReference)
    {
        //Make API call
        $response = RequestUtil::get(API::VIEW_TRANSACTION)
            ->setUrlParams(['{transactionReference}' => $transactionReference])
            ->call();
        return ResponseUtil::parse($response, new MerchantTransaction());
    }
}
