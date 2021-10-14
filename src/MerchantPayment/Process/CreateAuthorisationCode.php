<?php

namespace mmpsdk\MerchantPayment\Process;

use Exception;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\ResponseUtil;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\AccountIdentifier;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;
use mmpsdk\MerchantPayment\Validation\AuthorisationCodeValidator;

/**
 * Class AuthorisedPaymentCode
 * @package mmpsdk\MerchantPayment\Process
 */
class CreateAuthorisationCode
{
    /**
     * Generate an authorisation code which can in turn be used at a merchant to authorise a payment.
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param AuthorisationCode $authorisationCode
     * @param string $callBackUrl
     * @return RequestState|Exception
     */
    public static function execute($accountIdentifier, AuthorisationCode $authorisationCode, $callBackUrl = null)
    {
        $accountIdentifier = CommonUtil::DeserializeToSupportObject($accountIdentifier);

        //Validation
        $validator = new AuthorisationCodeValidator($authorisationCode, $accountIdentifier);

        //Make API call
        $response = RequestUtil::post(API::AUTHORISATION_CODE, json_encode($authorisationCode))
                        ->setUrlParams(['{accountId}' => CommonUtil::encodeSupportObjectToString($accountIdentifier)])
                        ->setClientCorrelationId(true)
                        ->httpHeader(Header::X_CALLBACK_URL, $callBackUrl ? $callBackUrl : MobileMoney::getCallbackUrl())
                        ->call();

        return ResponseUtil::parse($response, new RequestState());
    }
}
