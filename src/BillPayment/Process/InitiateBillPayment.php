<?php

namespace mmpsdk\BillPayment\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\BillPayment\Models\BillPay;

/**
 * Class InitiateBillPayment
 * @package mmpsdk\BillPayment\Process
 */
class InitiateBillPayment extends BaseProcess
{
    private $accountIdentifier;

    private $billReference;

    private $billPay;

    /**
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param string $billReference
     * @param BillPay $billPay
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        $accountIdentifier,
        $billReference,
        BillPay $billPay,
        $callBackUrl = null
    ) {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );
        CommonUtil::validateArgument(
            $billReference,
            'billReference',
            CommonUtil::TYPE_STRING
        );
        CommonUtil::validateArgument($billPay, 'billPay');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->billReference = $billReference;
        $this->billPay = $billPay;
        return $this;
    }

    /**
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_BILL_PAYMENT,
            json_encode($this->billPay)
        )
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                ),
                '{billReference}' => $this->billReference
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
