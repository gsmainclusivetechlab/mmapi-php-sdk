<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\MerchantPayment\Models\AuthorisationCode;

/**
 * Class ViewAuthorisationCode
 * @package mmpsdk\MerchantPayment\Process
 */
class ViewAuthorisationCode extends BaseProcess
{
    private $accountIdentifier;

    private $authorisationCode;

    /**
     * Allows a mobile money payer or payee to view authorisation codes for a given account.
     *
     * @param array $accountIdentifier
     * @param string $authorisationCode
     * @return this
     */
    public function __construct($accountIdentifier, $authorisationCode)
    {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );

        CommonUtil::validateArgument(
            $authorisationCode,
            'authorisationCode',
            CommonUtil::TYPE_STRING
        );
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->authorisationCode = $authorisationCode;
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        return $this;
    }

    /**
     *
     * @return AuthorisationCode
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_AUTHORISATION_CODE)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                ),
                '{authorisationCode}' => $this->authorisationCode
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new AuthorisationCode());
    }
}
