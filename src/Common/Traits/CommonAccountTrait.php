<?php

namespace mmpsdk\Common\Traits;

trait CommonAccountTrait
{
    /**
     * Returns the balances for the specified account.
     *
     * @param array $accountIdentifier
     * @param array $filter
     * @return AccountBalance
     */
    public static function viewAccountBalance(
        $accountIdentifier,
        $filter = null
    ) {
        return new \mmpsdk\Common\Process\AccountBalance(
            $accountIdentifier,
            $filter
        );
    }

    /**
     * Returns a set of transactions for a given account.
     *
     * @param array $accountIdentifier
     * @param array $filter
     * @return RetrieveAccountTransactions
     */
    public static function viewAccountTransactions(
        $accountIdentifier,
        $filter = null
    ) {
        return new \mmpsdk\Common\Process\RetrieveAccountTransactions(
            $accountIdentifier,
            $filter
        );
    }

    /**
     * To reverse a merchant transaction in failure scenarios.
     * Asynchronous flow is used with a final callback.
     *
     * @param string $transactionReference
     * @param Reversal $reversal
     * @param string $callBackUrl
     * @return TransactionReversal
     */
    public static function createReversal(
        $transactionReference,
        \mmpsdk\Common\Models\Reversal $reversal = null,
        $callBackUrl = null
    ) {
        return new \mmpsdk\Common\Process\TransactionReversal(
            $transactionReference,
            $reversal,
            $callBackUrl
        );
    }
}
