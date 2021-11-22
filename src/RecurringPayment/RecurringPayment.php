<?php

namespace mmpsdk\RecurringPayment;

/**
 * Class RecurringPayment
 * @package mmpsdk\RecurringPayment
 */
class RecurringPayment
{
    /**
     * Allows for a new debit mandate to be created for a specific account.
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param DebitMandate $debitMandate
     * @param string $callBackUrl
     * @return AccountDebitMandate
     */
    public static function createAccountDebitMandate(
        $accountIdentifier,
        \mmpsdk\RecurringPayment\Models\DebitMandate $debitMandate,
        $callBackUrl = null
    ) {
        return new \mmpsdk\RecurringPayment\Process\AccountDebitMandate(
            $accountIdentifier,
            $debitMandate,
            $callBackUrl
        );
    }
}
