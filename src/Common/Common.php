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

    /**
     * Request an international quotation.
     * Asynchronous flow is used with a final callback.
     *
     * @param Quotation $quotation
     * @param string $callBackUrl
     * @return TransferQuotation
     */
    public static function createQuotation(
        \mmpsdk\Common\Models\Quotation $quotation,
        $callBackUrl = null
    ) {
        return new \mmpsdk\Common\Process\TransferQuotation(
            $quotation,
            $callBackUrl
        );
    }

    /**
     * Returns a specific quotation
     *
     * @param string $quotationReference
     * @return ViewQuotation
     */
    public static function viewQuotation($quotationReference)
    {
        return new \mmpsdk\Common\Process\ViewQuotation($quotationReference);
    }

    /**
     * Retrieves the status of a given account.
     *
     * @param array $accountIdentifier
     * @return this
     */
    public static function viewAccountName($accountIdentifier)
    {
        return new \mmpsdk\Common\Process\RetrieveAccountName(
            $accountIdentifier
        );
    }

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
