<?php

namespace mmpsdk\Common\Traits;

trait QuotationTrait
{
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
}
