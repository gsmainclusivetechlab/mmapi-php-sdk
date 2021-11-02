<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Models\Transaction;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;

/**
 * Class InitiateTransaction
 * @package mmpsdk\Common\Process
 */
class InitiateTransaction extends BaseProcess
{
    /**
     * Transaction object
     *
     * @var Transaction
     */
    private $transaction;

    /**
     * Transaction type
     *
     * @var Transaction
     */
    protected $transactionType;

    /**
     * Initiates a Transaction Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Transaction $transaction
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        Transaction $transaction,
        $callBackUrl = false
    ) {
        CommonUtil::validateArgument(
            $transaction,
            'transaction'
        );
        // $validator = new TransactionValidator($transaction);
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->transaction = $transaction;
        return $this;
    }

    /**
     *
     * @return Transaction
     */
    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_TRANSACTION,
            json_encode($this->transaction)
        )
            ->setUrlParams([
                '{transactionType}' => $this->transactionType
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
