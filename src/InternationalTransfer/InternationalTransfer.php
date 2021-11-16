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

    /**
     * Request an international quotation.
     * Asynchronous flow is used with a final callback.
     *
     * @param Quotation $quotation
     * @param string $callBackUrl
     * @return TransferQuotation
     */
    public static function createQuotation(
        \mmpsdk\InternationalTransfer\Models\Quotation $quotation, $callBackUrl = null
    ) {
        return new \mmpsdk\InternationalTransfer\Process\TransferQuotation(
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
    public static function viewQuotation(
        $quotationReference
    ) {
        return new \mmpsdk\InternationalTransfer\Process\ViewQuotation(
            $quotationReference
        );
    }
}
