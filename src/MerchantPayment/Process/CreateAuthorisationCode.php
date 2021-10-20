<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\ResponseUtil;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;
use mmpsdk\MerchantPayment\Validation\AuthorisationCodeValidator;

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
     * @return Process
     */
    public static function build(
        $accountIdentifier,
        AuthorisationCode $authorisationCode,
        $callBackUrl = null
    ) {
        $validator = new AuthorisationCodeValidator($authorisationCode);
        $context = new self(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $context->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $context->authorisationCode = $authorisationCode;
        return $context;
    }

    /**
     * @return RequestState
     */
    public function execute()
    {
        $response = RequestUtil::post(
            API::AUTHORISATION_CODE,
            json_encode($this->authorisationCode)
        )
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(
                Header::X_CALLBACK_URL,
                $this->callBackUrl
                    ? $this->callBackUrl
                    : MobileMoney::getCallbackUrl()
            )
            ->call();

        return ResponseUtil::parse($response, new RequestState());
    }
}
