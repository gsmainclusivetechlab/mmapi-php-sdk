<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Utils\ResponseUtil;
use mmpsdk\MerchantPayment\Models\MerchantTransaction;

class RetrieveTransaction
{
    /**
     * Retrieves the final representation of the transaction using the transaction reference passed via the poll request method.
     * @param string $transactionReference
     * @return MerchantTransaction|Exception
     */
    public static function execute($transactionReference)
    {
        $response = RequestUtil::get(API::VIEW_TRANSACTION)
            ->setUrlParams(['{transactionReference}' => $transactionReference])
            ->call();
        return ResponseUtil::parse($response, new MerchantTransaction());
    }
}
