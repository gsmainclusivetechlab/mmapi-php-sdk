<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Utils\CommonUtil;
use mmpsdk\Common\Utils\EncDecUtil;

class AccessToken extends BaseProcess
{
    private $consumerKey;

    private $secretKey;

    /**
     * Use this API call to generate an Access Token. You can then use the token to authenticate on subsequent API requests until the token expires.
     * To generate the access token, a Consumer Key and a Consumer Secret is required
     *
     */
    public function __construct($consumerKey, $secretKey)
    {
        CommonUtil::validateArgument($consumerKey, 'consumerKey');
        CommonUtil::validateArgument($secretKey, 'secretKey');
        $this->setUp(self::SYNCHRONOUS_PROCESS);
        $this->consumerKey = $consumerKey;
        $this->secretKey = $secretKey;
        return $this;
    }

    public function execute()
    {
        $request = RequestUtil::post(
            API::ACCESS_TOKEN,
            'grant_type=client_credentials&='
        )
            ->httpHeader(
                Header::AUTHORIZATION,
                EncDecUtil::getBasicAuthHeader(
                    $this->consumerKey,
                    $this->secretKey
                )
            )
            ->httpHeader(
                Header::CONTENT_TYPE,
                'application/x-www-form-urlencoded'
            )
            ->build();
        $response = $this->makeRequest($request);
        return $this->parseResponse($response);
    }
}
