<?php

namespace mmpsdk\AccountLinking;

use mmpsdk\Common\Traits\CommonTrait;
use mmpsdk\Common\Traits\CommonAccountTrait;
use mmpsdk\Common\Traits\TransferTransactionTrait;

/**
 * Class AccountLinking
 * @package mmpsdk\AccountLinking
 */
class AccountLinking
{
    use CommonTrait;
    use CommonAccountTrait;
    use TransferTransactionTrait;

    /**
     * Initiates a Account Link Request.
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param AccountLink $accountLink
     * @param string $callBackUrl
     * @return InitiateAccountLink
     */
    public static function createAccountLink(
        $accountIdentifier,
        \mmpsdk\AccountLinking\Models\AccountLink $accountLink,
        $callBackUrl = null
    ) {
        return new \mmpsdk\AccountLinking\Process\InitiateAccountLink(
            $accountIdentifier,
            $accountLink,
            $callBackUrl
        );
    }

    /**
     * Allows a mobile money payer or payee to view account links for a given account.
     *
     * @param array $accountIdentifier
     * @param string $linkReference
     * @return ViewAccountLink
     */
    public static function ViewAccountLink($accountIdentifier, $linkReference)
    {
        return new \mmpsdk\AccountLinking\Process\ViewAccountLink(
            $accountIdentifier,
            $linkReference
        );
    }
}
