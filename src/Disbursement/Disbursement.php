<?php

namespace mmpsdk\Disbursement;

use mmpsdk\Common\Traits\CommonTrait;
use mmpsdk\Common\Traits\CommonAccountTrait;

/**
 * Class Disbursement
 * @package mmpsdk\Disbursement
 */
class Disbursement
{
    use CommonTrait;
    use CommonAccountTrait;

    /**
     * Initiates a Disbursement Transaction Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $transaction
     * @param string $callBackUrl
     * @return InitiateDisbursement
     */
    public static function createDisbursementTransaction(
        \mmpsdk\Common\Models\Transaction $transaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\Disbursement\Process\InitiateDisbursement(
            $transaction,
            $callBackUrl
        );
    }

    /**
     * Make a bulk disbursement.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param BatchTransaction $batchTransaction
     * @param string $callBackUrl
     * @return InitiateBulkDisbursement
     */
    public static function createBatchTransaction(
        \mmpsdk\Disbursement\Models\BatchTransaction $batchTransaction,
        $callBackUrl = null
    ) {
        return new \mmpsdk\Disbursement\Process\InitiateBulkDisbursement(
            $batchTransaction,
            $callBackUrl
        );
    }

    /**
     * Gets all completed transactions for a given batch.
     *
     * @param string $batchId
     * @param array $filter
     * @return CompletedBatchTransaction
     */
    public static function viewBatchCompletions($batchId, $filter = null)
    {
        return new \mmpsdk\Disbursement\Process\CompletedBatchTransaction(
            $batchId,
            $filter
        );
    }

    /**
     * Gets all rejected transactions for a given batch.
     *
     * @param string $batchId
     * @param array $filter
     * @return RejectedBatchTransaction
     */
    public static function viewBatchRejections($batchId, $filter = null)
    {
        return new \mmpsdk\Disbursement\Process\RejectedBatchTransaction(
            $batchId,
            $filter
        );
    }

    /**
     * Gets the current status of a batch transaction
     *
     * @param string $batchId
     * @return RetrieveBatchTransaction
     */
    public static function viewBatchTransaction($batchId)
    {
        return new \mmpsdk\Disbursement\Process\RetrieveBatchTransaction(
            $batchId
        );
    }

    /**
     * Approve a batch trandsaction.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param array $patchData
     * @param BatchTransaction $batchTransaction
     * @param string $callBackUrl
     * @return ApproveBatchTransaction
     */
    public static function updateBatchTransaction(
        $patchData,
        $batchId,
        $callBackUrl = null
    ) {
        return new \mmpsdk\Disbursement\Process\ApproveBatchTransaction(
            $patchData,
            $batchId,
            $callBackUrl
        );
    }
}
