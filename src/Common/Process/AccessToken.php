<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Utils\EncDecUtil;
use mmpsdk\Common\Utils\ResponseUtil;

class AccessToken extends BaseProcess
{
    private $consumerKey;

    private $secretKey;

    /**
     * Use this API call to generate an Access Token. You can then use the token to authenticate on subsequent API requests until the token expires.
     * To generate the access token, a Consumer Key and a Consumer Secret is required
     *
     */
    public static function build($consumerKey, $secretKey)
    {
        $context = new self(self::SYNCHRONOUS_PROCESS);
        $context->consumerKey = $consumerKey;
        $context->secretKey = $secretKey;
        return $context;
    }

    public function execute()
    {
        $response = RequestUtil::post(
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
            ->call();
        return ResponseUtil::parse($response);
    }
}
