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

    private $filter = null;

    /**
     * Allows a mobile money payer or payee to view authorisation codes for a given account.
     *
     * @param array $accountIdentifier
     * @param array $filter
     * @return this
     */
    public function __construct($accountIdentifier, $filter = null)
    {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            'array'
        );
        if ($filter) {
            CommonUtil::validateArgument($filter, 'filter', 'array');
        }
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->filter = $filter;
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
        $request = RequestUtil::get(API::AUTHORISATION_CODE, $this->filter)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new AuthorisationCode());
    }
}
