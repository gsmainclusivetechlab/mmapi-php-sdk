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
use mmpsdk\Common\Models\AccountIdentifier;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;
use mmpsdk\MerchantPayment\Validation\AuthorisationCodeValidator;

/**
 * Class AuthorisedPaymentCode
 * @package mmpsdk\MerchantPayment\Process
 */
class AuthorisedPaymentCode
{
    /**
     * Generate an authorisation code which can in turn be used at a merchant to authorise a payment.
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountId
     * @param AuthorisationCode $authorisationCode
     * @param string $callBackUrl
     * @return RequestState|Exception
     */
    public static function execute($accountId, AuthorisationCode $authorisationCode, $callBackUrl = null)
    {
        //Validation
        $validator = new AuthorisationCodeValidator($authorisationCode);

        // if ($accountId != null) {
        //     $accountIdentifierArray = array();
        //     foreach ($accountId as $key => $value) {
        //         $accountid = new AccountIdentifier();
        //         $accountid->setKey($key)
        //                 ->setValue($value);
        //         array_push($accountIdentifierArray, $accountId);
        //     }
        // }

        //Make API call
        $response = RequestUtil::post(API::CREATE_AUTHORISATION_CODE, json_encode($authorisationCode))
                        ->setUrlParams(['{accountId}' => $accountId])
                        ->setClientCorrelationId(true)
                        ->httpHeader(Header::X_CALLBACK_URL, $callBackUrl ? $callBackUrl : MobileMoney::getCallbackUrl())
                        ->call();

        return ResponseUtil::parse($response, new RequestState());
    }
}
