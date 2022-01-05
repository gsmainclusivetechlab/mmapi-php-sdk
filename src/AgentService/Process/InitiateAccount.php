<?php

namespace mmpsdk\AgentService\Process;

use mmpsdk\AgentService\Models\Account;
use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;

/**
 * Class InitiateAccount
 * @package mmpsdk\AgentService\Process
 */
class InitiateAccount extends BaseProcess
{
    /**
     * Account object
     *
     * @var Account
     */
    private $account;

    /**
     * Initiates a Account Request.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param Account $account
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(Account $account, $callBackUrl = null)
    {
        CommonUtil::validateArgument($account, 'account');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->account = $account;
        return $this;
    }

    /**
     *
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::post(
            API::GENERAL_ACCOUNT,
            json_encode($this->account)
        )
            ->setUrlParams([
                '{identityType}' => 'individual'
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();
        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
