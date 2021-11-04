<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;

/**
 * Class CreateAuthorisationCode
 * @package mmpsdk\MerchantPayment\Process
 */
class CreateAuthorisationCode extends BaseProcess
{
    private $accountIdentifier;

    private $authorisationCode;

    /**
     * Generate an authorisation code which can in turn be used at a merchant to authorise a payment.
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param AuthorisationCode $authorisationCode
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        $accountIdentifier,
        AuthorisationCode $authorisationCode,
        $callBackUrl = false
    ) {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            'array'
        );
        CommonUtil::validateArgument($authorisationCode, 'authorisationCode');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->authorisationCode = $authorisationCode;
        return $this;
    }

    /**
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::post(
            API::AUTHORISATION_CODE,
            json_encode($this->authorisationCode)
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
