<?php

namespace mmpsdk\Common\Traits;

trait TransferTransactionTrait
{
    /**
     * Make a Transfer transaction using the mobile money API.
     * Asynchronous flow is used with a final callback.
     *
     * @param Transaction $transaction
     * @param string $callBackUrl
     * @return InitiateTransferTransaction
     */
    public static function createTransferTransaction(
        \mmpsdk\Common\Models\Transaction $transaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\Common\Process\InitiateTransferTransaction(
            $transaction,
            $callBackUrl
        );
    }
}
