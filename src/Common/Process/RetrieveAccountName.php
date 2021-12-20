<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\AccountHolderName;
use mmpsdk\Common\Process\BaseProcess;

/**
 * Class RetrieveAccountName
 * @package mmpsdk\Common\Process
 */
class RetrieveAccountName extends BaseProcess
{
    /**
     * Account Identifier Attributes
     *
     * @var array
     */
    private $accountIdentifier;

    /**
     * Retrieves the status of a given account.
     *
     * @param array $accountIdentifier
     * @return this
     */
    public function __construct($accountIdentifier)
    {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        return $this;
    }

    /**
     *
     * @return AccountHolderName
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_ACCOUNT_NAME)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new AccountHolderName());
    }
}
