<?php

namespace mmpsdk\Disbursement\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Models\BatchTransaction;

/**
 * Class InitiateBulkDisbursement
 * @package mmpsdk\Disbursement\Process
 */
class InitiateBulkDisbursement extends BaseProcess
{
    /**
     * Merchant Transaction object
     *
     * @var BatchTransaction
     */
    private $batchTransaction;

    /**
     * Make a bulk disbursement.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param BatchTransaction $batchTransaction
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        BatchTransaction $batchTransaction,
        $callBackUrl = false
    ) {
        CommonUtil::validateArgument($batchTransaction, 'batchTransaction');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->batchTransaction = $batchTransaction;
        return $this;
    }

    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_BATCH_TRANSACTION,
            json_encode($this->batchTransaction)
        )
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
