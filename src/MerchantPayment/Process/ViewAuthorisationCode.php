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
     * @return Process
     */
    public static function build($accountIdentifier, $filters = [])
    {
        $context = new self(self::SYNCHRONOUS_PROCESS);
        $context->filters = $filters;
        $context->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        return $context;
    }

    /**
     *
     * @return AuthorisationCode
     */
    public function execute()
    {
        $response = RequestUtil::get(API::AUTHORISATION_CODE, $this->filters)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->call();
        return ResponseUtil::parse($response, new AuthorisationCode());
    }
}
