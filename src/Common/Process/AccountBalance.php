<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\ResponseUtil;
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
     * @return Process
     */
    public static function build($accountIdentifier, $filter = null)
    {
        $context = new self(self::SYNCHRONOUS_PROCESS);
        $context->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $context->filter = $filter;
        return $context;
    }

    /**
     *
     * @return Balance
     */
    public function execute()
    {
        $response = RequestUtil::get(API::VIEW_ACCOUNT_BALANCE, $this->filter)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->call();
        print_r($response);
        return ResponseUtil::parse($response, new Balance());
    }
}
