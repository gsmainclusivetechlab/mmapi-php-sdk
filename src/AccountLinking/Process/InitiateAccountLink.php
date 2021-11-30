<?php

namespace mmpsdk\AccountLinking\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\AccountLinking\Models\AccountLink;

/**
 * Class InitiateAccountLink
 * @package mmpsdk\Disbursement\Process
 */
class InitiateAccountLink extends BaseProcess
{
    private $accountIdentifier;

    /**
     * Account Linking object
     *
     * @var accountLinking
     */
    private $accountLinking;

    /**
     * Set up an account link .
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param AccountLink $accountLinking
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        $accountIdentifier,
        $accountLinking,
        $callBackUrl = null
    ) {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );

        CommonUtil::validateArgument($accountLinking, 'accountLinking');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->accountLinking = $accountLinking;
        return $this;
    }

    /**
     *
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::post(
            API::CREATE_LINK,
            json_encode($this->accountLinking)
        )
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                )
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
