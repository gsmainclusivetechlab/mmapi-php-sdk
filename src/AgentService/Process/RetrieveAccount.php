<?php

namespace mmpsdk\AgentService\Process;

use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\AgentService\Models\Account;
use mmpsdk\Common\Process\BaseProcess;

/**
 * Class RetrieveAccount
 * @package mmpsdk\AgentService\Process
 */
class RetrieveAccount extends BaseProcess
{
    /**
     * Account Identifier Attributes
     *
     * @var array
     */
    private $accountIdentifier;

    /**
     * Using the Object Reference passed via the /requeststates API,
     * the final representation of the transaction can be returned.
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
     * @return mixed
     */
    public function execute()
    {
        $request = RequestUtil::get(API::GENERAL_ACCOUNT_ID)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->build();
        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new Account());
    }
}
