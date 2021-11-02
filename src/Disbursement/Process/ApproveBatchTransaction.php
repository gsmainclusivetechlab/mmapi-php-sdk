<?php

namespace mmpsdk\Disbursement\Process;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\GenericPatchRequest;
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
     * @param BatchTransaction $batchTransaction
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        $batchId,
        $callBackUrl = false
    ) {
        CommonUtil::validateArgument($batchId, 'batchId', 'string');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $patchRequest = new GenericPatchRequest();
        $patchRequest->setOp(GenericPatchRequest::REPLACE)
            ->setPath('/batchStatus')
            ->setValue('approved');
        $this->batchTransaction = array($patchRequest);
        $this->batchId = $batchId;
        return $this;
    }

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
        print_r($response);
        return $this->parseResponse($response, new RequestState());
    }
}
