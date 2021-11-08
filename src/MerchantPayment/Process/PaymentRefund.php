<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\MerchantPayment\Enums\TransactionType;

/**
 * Class PaymentRefund
 * @package mmpsdk\MerchantPayment\Process
 */
class PaymentRefund extends BaseProcess
{
    private $merchantTransaction;

    /**
     * The merchant initiates the request for refund.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $merchantTransaction
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        Transaction $merchantTransaction,
        $callBackUrl = null
    ) {
        CommonUtil::validateArgument(
            $merchantTransaction,
            'merchantTransaction'
        );
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->merchantTransaction = $merchantTransaction;
        return $this;
    }

    /**
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_TRANSACTION,
            json_encode($this->merchantTransaction)
        )
            ->setUrlParams(['{transactionType}' => TransactionType::ADJUSTMENT])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
