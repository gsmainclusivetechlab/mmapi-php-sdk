<?php

namespace mmpsdk\AccountLinking\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\AccountLinking\Models\Link;

/**
 * Class InitiateAccountLink
 * @package mmpsdk\Disbursement\Process
 */
class InitiateAccountLink extends BaseProcess
{
    private $accountIdentifier;

    /**
     * Link object
     *
     * @var Link
     */
    private $link;

    /**
     * Set up an account link .
     * Asynchronous flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param Link $link
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        $accountIdentifier,
        Link $link,
        $callBackUrl = null
    ) {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );

        CommonUtil::validateArgument($link, 'link');
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->link = $link;
        return $this;
    }

    /**
     *
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::post(API::CREATE_LINK, json_encode($this->link))
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
