<?php

namespace mmpsdk\MerchantPayment\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\ResponseUtil;
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

    private $filters = [];

    /**
     * Allows a mobile money payer or payee to view authorisation codes for a given account.
     *
     * @param array $accountIdentifier
     * @param array $filters
     * @return this
     */
    public function __construct($accountIdentifier, $filters = [])
    {
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->filters = $filters;
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
        $request = RequestUtil::get(
            API::AUTHORISATION_CODE,
            $this->filters
        )->setUrlParams([
            '{accountId}' => CommonUtil::encodeSupportObjectToString(
                $this->accountIdentifier
            )
        ]);

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new AuthorisationCode());
    }
}
