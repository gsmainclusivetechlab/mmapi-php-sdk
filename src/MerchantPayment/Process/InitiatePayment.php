<?php

namespace mmpsdk\MerchantPayment\Process;

use Exception;
use mmpsdk\MerchantPayment\Models\MerchantTransaction;
use mmpsdk\MerchantPayment\Validation\TransactionValidator;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\ResponseUtil;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;

/**
 * Class InitiatePayment
 * @package mmpsdk\MerchantPayment\Process
 */
class InitiatePayment extends BaseProcess
{
    /**
     * Merchant Transaction object
     *
     * @var MerchantTransaction
     */
    private $merchantTransaction;

    /**
     * The merchant initiates the request and will be credited when the payer approves the request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param MerchantTransaction $merchantTransaction
     * @param string $callBackUrl
     * @return Process
     */
    public static function build(
        MerchantTransaction $merchantTransaction,
        $callBackUrl = null
    ) {
        $validator = new TransactionValidator($merchantTransaction);
        $context = new self(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $context->merchantTransaction = $merchantTransaction;
        return $context;
    }

    public function execute()
    {
        $response = RequestUtil::post(
            API::CREATE_TRANSACTION,
            json_encode($this->merchantTransaction)
        )
            ->setUrlParams([
                '{transactionType}' => $this->merchantTransaction->getType()
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->call();

        return ResponseUtil::parse($response, new RequestState());
    }
}
