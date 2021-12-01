<?php

namespace mmpsdk\RecurringPayment;

use mmpsdk\Common\Traits\CommonTrait;
use mmpsdk\Common\Traits\CommonAccountTrait;
use mmpsdk\Common\Traits\MerchantTransactionTrait;

/**
 * Class RecurringPayment
 * @package mmpsdk\RecurringPayment
 */
class RecurringPayment
{
    use CommonTrait;
    use CommonAccountTrait;
    use MerchantTransactionTrait;

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

    /**
     * Fetch debit mandate using reference id
     *
     * @param array $accountIdentifier
     * @param string $mandateReference
     * @return RetrieveAccountDebitMandate
     */
    public static function viewAccountDebitMandate(
        $accountIdentifier,
        $mandateReference
    ) {
        return new \mmpsdk\RecurringPayment\Process\RetrieveAccountDebitMandate(
            $accountIdentifier,
            $mandateReference
        );
    }
}
