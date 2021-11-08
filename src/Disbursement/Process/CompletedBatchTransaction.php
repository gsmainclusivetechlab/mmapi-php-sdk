<?php

namespace mmpsdk\Disbursement\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Models\BatchCompletion;

/**
 * Class CompletedBatchTransaction
 * @package mmpsdk\Disbursement\Process
 */
class CompletedBatchTransaction extends BaseProcess
{
    /**
     * Batch id
     *
     * @var string
     */
    private $batchId;

    /**
     * Filters
     *
     * @var array
     */
    private $filter;

    /**
     * Gets all completed transactions for a given batch.
     *
     * @param string $batchId
     * @param array $filter
     * @return this
     */
    public function __construct($batchId, $filter = null)
    {
        CommonUtil::validateArgument($batchId, 'batchId', 'string');
        if ($filter) {
            CommonUtil::validateArgument($filter, 'filter', 'array');
        }
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->batchId = $batchId;
        $this->filter = $filter;
        return $this;
    }

    /**
     *
     * @return BatchCompletion
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_BATCH_COMPLETEIONS, $this->filter)
            ->setUrlParams([
                '{batchId}' => $this->batchId
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new BatchCompletion());
    }
}
