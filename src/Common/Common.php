<?php

namespace mmpsdk\Common;

/**
 * Class Common
 * @package mmpsdk\Common
 */
class Common
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
     * Retrieves the state of a request for a given Server Correlation Id.
     *
     * @param string $serverCorrelationId
     * @return PollRequest
     */
    public static function viewRequestState($serverCorrelationId)
    {
        return new \mmpsdk\Common\Process\PollRequest($serverCorrelationId);
    }

    /**
     * Returns a set of transactions for a given account.
     *
     * @param array $accountIdentifier
     * @param array $filter
     * @return RetrieveAccountTransactions
     */
    public static function viewAccountTransaction(
        $accountIdentifier,
        $filter = null
    ) {
        return new \mmpsdk\Common\Process\RetrieveAccountTransactions(
            $accountIdentifier,
            $filter
        );
    }

    /**
     * Retrieves a representation of the resource assuming that it exists.
     *
     * @param string $clientCorrelationId
     * @param Object $objRef
     * @return RetrieveMissingResponse
     */
    public static function viewResponse($clientCorrelationId, $objRef = null)
    {
        return new \mmpsdk\Common\Process\RetrieveMissingResponse(
            $clientCorrelationId,
            $objRef
        );
    }

    /**
     * To determine the availability of the service from the API provider.
     *
     * @return ServiceAvailability
     */
    public static function viewServiceAvailability()
    {
        return new \mmpsdk\Common\Process\ServiceAvailability();
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
    public static function createReversalTransaction(
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

    /**
     * Retrieve transaction object using reference id
     *
     * @param array $transactionReference
     * @param object $ObjRef
     * @return RetrieveTransaction
     */
    public static function viewTransaction($transactionReference)
    {
        return new \mmpsdk\Common\Process\RetrieveTransaction(
            $transactionReference
        );
    }
}
