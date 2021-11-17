<?php

namespace mmpsdk\MerchantPayment;

/**
 * Class MerchantPayment
 * @package mmpsdk\MerchantPayment
 */
class MerchantPayment
{
    /**
     * Generate an authorisation code which can in turn be used at a merchant to authorise a payment.
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param AuthorisationCode $authorisationCode
     * @param string $callBackUrl
     * @return CreateAuthorisationCode
     */
    public static function createAuthorisationCode(
        $accountIdentifier,
        \mmpsdk\MerchantPayment\Models\AuthorisationCode $authorisationCode,
        $callBackUrl = null
    ) {
        return new \mmpsdk\MerchantPayment\Process\CreateAuthorisationCode(
            $accountIdentifier,
            $authorisationCode,
            $callBackUrl
        );
    }

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

    /**
     * Allows a mobile money payer or payee to view authorisation codes for a given account.
     *
     * @param array $accountIdentifier
     * @param string $authorisationCode
     * @return ViewAuthorisationCode
     */
    public static function viewAuthorisationCode(
        $accountIdentifier,
        $authorisationCode
    ) {
        return new \mmpsdk\MerchantPayment\Process\ViewAuthorisationCode(
            $accountIdentifier,
            $authorisationCode
        );
    }
}
