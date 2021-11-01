<?php

namespace mmpsdk\Disbursement\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Models\BatchRejection;

/**
 * Class RetrieveRejectedBatchTransaction
 * @package mmpsdk\Disbursement\Process
 */
class RetrieveRejectedBatchTransaction extends BaseProcess
{
    /**
     * Batch id
     *
     * @var string
     */
    private $batchId;

    /**
     * Gets all completed transactions for a given batch.
     *
     * @param string $batchId
     * @return this
     */
    public function __construct(
        $batchId
    ) {
        CommonUtil::validateArgument(
            $batchId,
            'batchId',
            'string'
        );
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->batchId = $batchId;
        return $this;
    }

    public function execute()
    {
        $request = RequestUtil::get(
            API::VIEW_BATCH_REJECTIONS
        )
            ->setUrlParams([
                '{batchId}' => $this->batchId
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new BatchRejection());
    }
}
