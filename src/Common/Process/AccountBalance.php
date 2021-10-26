<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\Balance;
use mmpsdk\Common\Process\BaseProcess;

/**
 * Class AccountBalance
 * @package mmpsdk\Common\Process
 */
class AccountBalance extends BaseProcess
{
    /**
     * Account Identifier Attributes
     *
     * @var array
     */
    private $accountIdentifier;

    private $filter;

    /**
     * Returns a set of transactions for a given account.
     *
     * @param array $accountIdentifier
     * @param array $filter
     * @return this
     */
    public function __construct($accountIdentifier, $filter = null)
    {
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->filter = $filter;
        return $this;
    }

    /**
     *
     * @return Balance
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_ACCOUNT_BALANCE, $this->filter)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->build();
        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new Balance());
    }
}
