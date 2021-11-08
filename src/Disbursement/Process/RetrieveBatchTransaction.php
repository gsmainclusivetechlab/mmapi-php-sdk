<?php

namespace mmpsdk\Disbursement\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Models\BatchTransaction;

/**
 * Class RetrieveBatchTransaction
 * @package mmpsdk\Disbursement\Process
 */
class RetrieveBatchTransaction extends BaseProcess
{
    /**
     * Batch id
     *
     * @var string
     */
    private $batchId;

    /**
     * Gets the current status of a batch transaction
     *
     * @param string $batchId
     * @return this
     */
    public function __construct($batchId)
    {
        CommonUtil::validateArgument($batchId, 'batchId', 'string');
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->batchId = $batchId;
        return $this;
    }

    /**
     *
     * @return BatchTransaction
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_BATCH_TRANSACTION)
            ->setUrlParams([
                '{batchId}' => $this->batchId
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new BatchTransaction());
    }
}
