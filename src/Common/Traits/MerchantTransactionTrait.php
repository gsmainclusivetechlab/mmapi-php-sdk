<?php

namespace mmpsdk\Common\Traits;

trait MerchantTransactionTrait
{
    /**
     * Initiates a Merchant Transaction Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $transaction
     * @param string $callBackUrl
     * @return InitiatePayment
     */
    public static function createMerchantTransaction(
        \mmpsdk\Common\Models\Transaction $transaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\MerchantPayment\Process\InitiatePayment(
            $transaction,
            $callBackUrl
        );
    }

    /**
     * The merchant initiates the request for refund.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $merchantTransaction
     * @param string $callBackUrl
     * @return PaymentRefund
     */
    public static function createRefundTransaction(
        \mmpsdk\Common\Models\Transaction $transaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\MerchantPayment\Process\PaymentRefund(
            $transaction,
            $callBackUrl
        );
    }
}
