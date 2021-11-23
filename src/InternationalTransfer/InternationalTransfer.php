<?php

namespace mmpsdk\InternationalTransfer;

/**
 * Class InternationalTransfer
 * @package mmpsdk\InternationalTransfer
 */
class InternationalTransfer
{
    /**
     * Initiates a International Transaction Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $transaction
     * @param string $callBackUrl
     * @return InitiateDisbursement
     */
    public static function createInternationalTransaction(
        \mmpsdk\Common\Models\Transaction $transaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\InternationalTransfer\Process\InitiateInternationalTransaction(
            $transaction,
            $callBackUrl
        );
    }
}
