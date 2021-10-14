<?php

namespace mmpsdk\Common\Process;

use mmpsdk\Common\Utils\RequestUtil;
use mmpsdk\Common\Constants\Header;
use mmpsdk\Common\Constants\API;
use mmpsdk\Common\Constants\MobileMoney;
use mmpsdk\Common\Utils\EncDecUtil;
use mmpsdk\Common\Utils\ResponseUtil;

class AccessToken
{
    /**
     * Use this API call to generate an Access Token. You can then use the token to authenticate on subsequent API requests until the token expires.
     * To generate the access token, a Consumer Key and a Consumer Secret is required
     *
     */
    public static function execute()
    {
        //Make API call
        $consumerKey = MobileMoney::getConsumerKey();
        $secretKey = MobileMoney::getConsumerSecret();
        $response = RequestUtil::post(
            API::ACCESS_TOKEN,
            'grant_type=client_credentials&='
        )
            ->httpHeader(
                Header::AUTHORIZATION,
                EncDecUtil::getBasicAuthHeader($consumerKey, $secretKey)
            )
            ->httpHeader(
                Header::CONTENT_TYPE,
                'application/x-www-form-urlencoded'
            )
            ->call();
        return ResponseUtil::parse($response);
    }
}
