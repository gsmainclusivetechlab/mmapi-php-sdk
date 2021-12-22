<?php

namespace mmpsdk\BillPayment;

use mmpsdk\Common\Traits\CommonTrait;

/**
 * Class BillPayment
 * @package mmpsdk\BillPayment
 */
class BillPayment
{
    use CommonTrait;

    /**
     * returns bills linked to an account.
     *
     * @param array $accountIdentifier
     * @param array $filter
     * @return RetrieveAccountBills
     */
    public static function viewAccountBills($accountIdentifier, $filter = null)
    {
        return new \mmpsdk\BillPayment\Process\RetrieveAccountBills(
            $accountIdentifier,
            $filter
        );
    }

    /**
     * Initiates a Bill Transaction Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $transaction
     * @param string $callBackUrl
     * @return InitiateBillTransaction
     */
    public static function createBillTransaction(
        \mmpsdk\Common\Models\Transaction $transaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\BillPayment\Process\InitiateBillTransaction(
            $transaction,
            $callBackUrl
        );
    }

    /**
     * Initiates a Bill Payment Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param string $billReference
     * @param BillPay $billPay
     * @param string $callBackUrl
     * @return InitiateBillPayment
     */
    public static function createBillPayment(
        $accountIdentifier,
        $billReference,
        \mmpsdk\BillPayment\Models\BillPay $billPay,
        $callBackUrl = null
    ) {
        return new \mmpsdk\BillPayment\Process\InitiateBillPayment(
            $accountIdentifier,
            $billReference,
            $billPay,
            $callBackUrl
        );
    }

    /**
     * Returns a set of bill payments for a given account.
     *
     * @param array $accountIdentifier
     * @param string $billReference
     * @param array $filter
     * @return RetrieveBillPayment
     */
    public static function viewBillPayment(
        $accountIdentifier,
        $billReference,
        $filter = null
    ) {
        return new \mmpsdk\BillPayment\Process\RetrieveBillPayment(
            $accountIdentifier,
            $billReference,
            $filter
        );
    }
}
