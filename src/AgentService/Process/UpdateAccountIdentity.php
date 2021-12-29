<?php

namespace mmpsdk\AgentService\Process;

use mmpsdk\Common\Models\RequestState;
use mmpsdk\Common\Utils\RequestUtil;

use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Models\PatchData;
use mmpsdk\Common\Process\BaseProcess;

/**
 * Class UpdateAccountIdentity
 * @package mmpsdk\AgentService\Process
 */
class UpdateAccountIdentity extends BaseProcess
{
    /**
     * Account Identifier Attributes
     *
     * @var array
     */
    private $accountIdentifier;

    /**
     *
     * @var array
     */
    private $patchData;

    /**
     * Identity id
     *
     * @var string
     */
    private $identityId;

    /**
     * Updates an account identity.
     * Asynchronous payment flow is used with a final callback.
     *
     * @param array $accountIdentifier
     * @param string $identityId
     * @param array $patchData
     * @param string $callBackUrl
     * @return this
     */
    public function __construct(
        $accountIdentifier,
        $identityId,
        $patchData,
        $callBackUrl = null
    ) {
        CommonUtil::validateArgument(
            $accountIdentifier,
            'accountIdentifier',
            CommonUtil::TYPE_ARRAY
        );

        CommonUtil::validateArgument(
            $identityId,
            'identityId',
            CommonUtil::TYPE_STRING
        );
        CommonUtil::validateArgument(
            $patchData,
            'patchData',
            CommonUtil::TYPE_ARRAY
        );
        $this->setUp(self::ASYNCHRONOUS_PROCESS, $callBackUrl);
        $this->accountIdentifier = CommonUtil::DeserializeToSupportObject(
            $accountIdentifier
        );
        $this->patchData = $patchData;
        $this->identityId = $identityId;
        return $this;
    }

    /**
     *
     * @return RequestState
     */
    public function execute()
    {
        $request = RequestUtil::patch(
            API::UPDATE_ACCOUNT_IDENDITY,
            json_encode($this->patchData)
        )
            ->setUrlParams([
                '{accountId}' => CommonUtil::encodeSupportObjectToString(
                    $this->accountIdentifier
                ),
                '{identityId}' => $this->identityId
            ])
            ->setClientCorrelationId($this->clientCorrelationId)
            ->httpHeader(Header::X_CALLBACK_URL, $this->callBackUrl)
            ->build();

        $response = $this->makeRequest($request);
        return $this->parseResponse($response, new RequestState());
    }
}
