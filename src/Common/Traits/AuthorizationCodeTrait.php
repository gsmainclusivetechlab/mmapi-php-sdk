<?php

namespace mmpsdk\Common\Traits;

trait AuthorizationCodeTrait
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
