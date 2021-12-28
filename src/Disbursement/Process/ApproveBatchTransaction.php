<?php

namespace mmpsdk\Disbursement\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\PatchData;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Models\BatchTransaction;

/**
 * Class ApproveBatchTransaction
 * @package mmpsdk\Disbursement\Process
 */
class ApproveBatchTransaction extends BaseProcess
{
    /**
     * Merchant Transaction object
     *
     * @var BatchTransaction
     */
    private $batchTransaction;

    /**
     * Batch id
     *
     * @var string
     */
    private $batchId;

    /**
     * Approve a batch trandsaction.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param array $patchData
     * @param BatchTransaction $batchTransaction
     * @param string $callBackUrl
     * @return this
     */
    public function __construct($patchData, $batchId, $callBackUrl = null)
    {
        CommonUtil::validateArgument(
            $batchId,
            'batchId',
            CommonUtil::TYPE_STRING
        );
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->batchTransaction = $patchData;
        $this->batchId = $batchId;
        return $this;
    }

    /**
     *
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::patch(
            API::UPDATE_BATCH_TRANSACTION,
            json_encode($this->batchTransaction)
        )
            ->setUrlParams([
                '{batchId}' => $this->batchId
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
