<?php

namespace mmpsdk\Disbursement\Process;

use mmpsdk\MerchantPayment\Models\MerchantTransaction;
use mmpsdk\MerchantPayment\Validation\TransactionValidator;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Disbursement\Models\DisbursementTransaction;

/**
 * Class InitiateDisbursement
 * @package mmpsdk\MerchantPayment\Process
 */
class InitiateDisbursement extends BaseProcess
{
    /**
     * Merchant Transaction object
     *
     * @var DisbursementTransaction
     */
    private $disbursementTransaction;

    /**
     * Make a disbursement to a mobile money customer.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param DisbursementTransaction $disbursementTransaction
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        DisbursementTransaction $disbursementTransaction,
        $callBackUrl = false
    ) {
        CommonUtil::validateArgument(
            $disbursementTransaction,
            'disbursementTransaction'
        );
        // $validator = new TransactionValidator($merchantTransaction);
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->disbursementTransaction = $disbursementTransaction;
        return $this;
    }

    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_TRANSACTION,
            json_encode($this->disbursementTransaction)
        )
            ->setUrlParams([
                '{transactionType}' => $this->disbursementTransaction->getType()
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
