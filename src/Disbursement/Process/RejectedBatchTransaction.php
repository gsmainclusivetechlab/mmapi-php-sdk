<?php

namespace mmpsdk\Disbursement\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Models\BatchRejection;

/**
 * Class RejectedBatchTransaction
 * @package mmpsdk\Disbursement\Process
 */
class RejectedBatchTransaction extends BaseProcess
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
     * Gets all rejected transactions for a given batch.
     *
     * @param string $batchId
     * @param array $filter
     * @return this
     */
    public function __construct($batchId, $filter = null)
    {
        CommonUtil::validateArgument($batchId, 'batchId', CommonUtil::TYPE_STRING);
        if ($filter) {
            CommonUtil::validateArgument($filter, 'filter', CommonUtil::TYPE_ARRAY);
        }
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->batchId = $batchId;
        $this->filter = $filter;
        return $this;
    }

    /**
     *
     * @return BatchRejection
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_BATCH_REJECTIONS, $this->filter)
            ->setUrlParams([
                '{batchId}' => $this->batchId
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new BatchRejection());
    }
}
