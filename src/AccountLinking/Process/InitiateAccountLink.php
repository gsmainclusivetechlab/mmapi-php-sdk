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
     * @var accountLink
     */
    private $accountLink;

    /**
     * Set up an account link .
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param AccountLink $accountLink
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        $accountIdentifier,
        AccountLink $accountLink,
        $callBackUrl = null
    ) {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );

        CommonUtil::validateArgument($accountLink, 'accountLink');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->accountLink = $accountLink;
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
            json_encode($this->accountLink)
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
