<?php

namespace mmpsdk\AccountLinking\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Process\BaseProcess;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\AccountLinking\Models\Link;

/**
 * Class ViewAccountLink
 * @package mmpsdk\AccountLinking\Process
 */
class ViewAccountLink extends BaseProcess
{
    private $accountIdentifier;

    private $linkReference;

    /**
     * Allows a mobile money payer or payee to view link for a given account.
     *
     * @param array $accountIdentifier
     * @param string $linkReference
     * @return this
     */
    public function __construct($accountIdentifier, $linkReference)
    {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );

        CommonUtil::validateArgument(
            $linkReference,
            'linkReference',
            CommonUtil::TYPE_STRING
        );
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->linkReference = $linkReference;
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        return $this;
    }

    /**
     *
     * @return Link
     */
    public function execute()
    {
        $request = RequestUtil::get(API::VIEW_LINK)
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                ),
                '{linkReference}' => $this->linkReference
            ])
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new Link());
    }
}
