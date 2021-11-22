<?php

namespace mmpsdk\RecurringPayment\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\RecurringPayment\Models\DebitMandate;

/**
 * Class AccountDebitMandate
 * @package mmpsdk\RecurringPayment\Process
 */
class AccountDebitMandate extends BaseProcess
{
    private $accountIdentifier;

    private $debitMandate;

    /**
     * Allows for a new debit mandate to be created for a specific account.
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param DebitMandate $debitMandate
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        $accountIdentifier,
        DebitMandate $debitMandate,
        $callBackUrl = null
    ) {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );
        CommonUtil::validateArgument($debitMandate, 'debitMandate');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->debitMandate = $debitMandate;
        return $this;
    }

    /**
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_ACCOUNT_DEBIT_MANDATE,
            json_encode($this->debitMandate)
        )
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
