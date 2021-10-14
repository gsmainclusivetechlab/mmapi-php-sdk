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
class ViewAuthorisationCode
{
    /**
     * Allows a mobile money payer or payee to view authorisation codes for a given account.
     *
     * @param array $accountIdentifier
     * @return RequestState|Exception
     */
    public static function execute($accountIdentifier)
    {
        $accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );

        //Make API call
        $response = RequestUtil::get(API::AUTHORISATION_CODE)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $accountIdentifier
                )
            ])
            ->call();

        return ResponseUtil::parse($response, new AuthorisationCode());
    }
}
